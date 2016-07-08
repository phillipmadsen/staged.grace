<?php

namespace Fully\Http\Controllers;

use Flash;
use Fully\Helpers\Thumbnail;
use Fully\Http\Controllers\AppBaseController;
use Fully\Http\Requests\CreateProductRequest;
use Fully\Http\Requests\UpdateProductRequest;

use Fully\Models\Product;
use Fully\Models\ProductFeature;
use Fully\Models\ProductVariant;
use Fully\Models\ProductImage as ProductImage;
use Fully\Models\User;
use Fully\Repositories\Category\CategoryInterface;
use Fully\Repositories\Category\CategoryRepository as Category;
use Fully\Repositories\ProductRepository;
use Illuminate\Http\Request;
use File;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends AppBaseController
{

	private $productRepository;
	private $model;
	private $user;
	protected $productImage;
	protected $category;


	public function __construct(ProductRepository $productRepo, CategoryInterface $category, Product $model, User $user, ProductImage $productImage)
	{

		$this->productRepository = $productRepo;
		$this->category          = $category;
		$this->model             = $model;
		$this->user              = $user;
		$this->productImage      = $productImage;


	}

	/**
	 * Display a listing of the Product.
	 *
	 * @param  Request    $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$this->productRepository->pushCriteria(new RequestCriteria($request));
		$products = $this->productRepository->paginate(20);

		return view('backend.products.index')
			->with('products', $products);
	}

	/**
	 * Show the form for creating a new Product.
	 *
	 * @return Response
	 */
	public function create()
	{

		$productImages = $this->productImage->lists();
		$categories = $this->category->lists();

		return view('backend.products.create', compact('categories', 'product_images'));
	}


	public function store(CreateProductRequest $request)
	{

		$input = $request->all();

		$product = $this->productRepository->create($input, $request->except('attribute_name', 'product_attribute_value'));

		if($request->hasFile('images')) {
			$files = $request->file('images');

			foreach ($files as $file)
			{
				// Validate each file
				$rules     = [
					'images' => 'image|mimes:jpg,jpeg,bmp,png,gif|max:9000'
				];
				$validator = Validator::make(['file' => $file], $rules);

				if ($validator->fails())
				{
					return response()->json(['errors' => $validator->messages()->all()], 400);
				}

				//save the image and get the $path to the file

				ProductImage::create(
					'product_id' => $product->id,
	            'path' => $path);
	        }
		}

		if (!empty($request->attribute_name))
		{
			foreach ($request->attribute_name as $key => $item)
			{
				$productVariant                          = new ProductVariant();
				$productVariant->attribute_name          = $item;
				$productVariant->product_attribute_value = $request->product_attribute_value[$key];
				$product->productVariants()->save($productVariant);
			}
		}

		if (!empty($request->feature_name))
		{
			foreach ($request->feature_name as $feature)
			{
				$productFeature               = new ProductFeature();
				$productFeature->feature_name = $feature;
				$product->productFeatures()->save($productFeature);

			}
		}

	Flash::success('Product saved successfully.');


	return redirect(route(getLang() . '.admin.products.index'));
}

/**
 * Display the specified Product.
 *
 * @param  int        $id
 * @return Response
 */
function show($id)
{
	$product = $this->productRepository->findWithoutFail($id);

	if (empty($product))
	{
		Flash::error('Product not found');

		return redirect(route(getLang() . '.admin.products.index'));
	}

	return view('backend.products.show')->with('product', $product);
}

/**
 * Show the form for editing the specified Product.
 *
 * @param  int        $id
 * @return Response
 */
function edit($id)
{
	$product = $this->productRepository->findWithoutFail($id);

	if (empty($product))
	{
		Flash::error('Product not found');

		return redirect(route(getLang() . '.admin.products.index'));
	}

	return view('backend.products.edit')->with('product', $product);
}

/**
 * Update the specified Product in storage.
 *
 * @param  int                  $id
 * @param  UpdateProductRequest $request
 * @return Response
 */

function update($id, UpdateProductRequest $request)
{
	$product = $this->productRepository->findWithoutFail($id);

	if (empty($product))
	{
		Flash::error('Product not found');

		return redirect(route(getLang() . '.admin.products.index'));
	}

	if ($request->hasFile('product_image_file'))
	{
		$file = $request->file('product_image_file');
		$file = $this->productRepository->uploadProductImage($file);
		$request->merge([
			'product_image' => $file->getFileInfo()->getFilename()
		]);
		$this->generateProductThumbnail($file);
	}
	if (empty($product))
	{
		Flash::error('Product not found');
		return redirect(route('admin.products.index'));
	}

	$product->update($request->except('attribute_name', 'product_attribute_value', 'product_image_file', 'feature_name'));

	if (!empty($request->attribute_name))
	{
		foreach ($request->attribute_name as $key => $item)
		{
			$productVariant                          = new ProductVariant();
			$productVariant->attribute_name          = $item;
			$productVariant->product_attribute_value = $request->product_attribute_value[$key];
			$product->productVariants()->save($productVariant);
		}
	}

	if (!empty($request->feature_name))
	{
		foreach ($request->feature_name as $feature)
		{
			$productFeature               = new ProductFeature();
			$productFeature->feature_name = $feature;
			$product->productFeatures()->save($productFeature);
		}
	}

	$product = $this->productRepository->update($request->all(), $id);

	Flash::success('Product updated successfully.');

	return redirect(route(getLang() . '.admin.products.index'));
}

/**
 * Remove the specified Product from storage.
 *
 * @param  int        $id
 * @return Response
 */
function destroy($id)
{
	$product = $this->productRepository->findWithoutFail($id);

	if (empty($product))
	{
		Flash::error('Product not found');

		return redirect(route('admin.products.index'));
	}

	$this->productRepository->delete($id);

	Flash::success('Product deleted successfully.');

	return redirect(route('admin.products.index'));
}

/**
 * @param  array   $variants
 * @return mixed
 */
function getProductVariants($variants = [])
{
	if (isset($variants))
	{
		$variants = array_map(
			function ($v)
			{
				return explode(':', $v);
			},
			explode(',', $variants)
		);
	}
	return $variants;
}

/**
 * @param array $features
 * @return mixed
 */
function getProductFeatures($features = [])
{
	if (isset($features))
	{
		$features = array_map(
			function ($v)
			{
				return explode(':', $v);
			},
			explode(',', $features)
		);
	}
	return $features;
}

/**
 * @param $file
 */
function generateProductThumbnail($file)
{
	$sourcePath = $file->getPath() . '/' . $file->getFilename();
	$thumbPath  = $file->getPath() . '/thumb_' . $file->getFilename();
	Thumbnail::generate_image_thumbnail($sourcePath, $thumbPath);
}

/**
 * @param  $id
 * @return mixed
 */
function togglePublish($id)
{
	return $this->product->togglePublish($id);
}

function lists()
{
	//    return $this->product->get()->where('lang', $this->getLang())->lists('title', 'id');
}

};
