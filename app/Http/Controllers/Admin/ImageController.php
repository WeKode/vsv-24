<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Traits\UploadAble;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    use UploadAble;
    protected $product;

    public function __construct(ProductContract $product)
    {
        $this->product = $product;
    }



    public function store(Request $request): JsonResponse
    {
        $product = $this->product->findOneById($request->product_id);
        if ($request->has('image')) {

            $image = $this->uploadOne($request->image, 'product');

            $productImage = [
                'link'      =>  $image,
            ];
            $product->images()->create($productImage);
        }

        return response()->json(['status' => 'Success']);
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $image = Image::findOrFail($id);
        try {
            if ($image->link !== '') {
                $this->deleteOne($image->link);
            }
            $image->delete();
            session()->flash('success',__('messages.delete'));

        }catch(\Exception $exception){
            session()->flash('success',__('messages.fail'));

        }

        return redirect()->back();
    }

}
