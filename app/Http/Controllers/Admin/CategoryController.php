<?php

namespace App\Http\Controllers\Web\Admin;

use App\Contracts\CategoryContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @var CategoryContract
     */
    protected $category;

    /**
     * CategoryController constructor.
     * @param CategoryContract $category
     */
    public function __construct(CategoryContract $category)
    {
        $this->category = $category;

        $this->middleware(['permission:view-category'])->only(['index', 'show']);
        $this->middleware(['permission:edit-category'])->only(['edit', 'update']);
        $this->middleware(['permission:create-category'])->only(['create', 'store']);
        $this->middleware(['permission:delete-category'])->only(['destroy']);
    }

    /**
     * @return Renderable
     */
    public function index() : Renderable
    {
        $this->authorize('view-category');
        $categories = $this->category->findByFilter();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('admin.categories.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|unique:categories,name|max:100',
            'description' => 'sometimes|nullable|string'
        ]);
        $this->category->new($data);
        session()->flash('success',__('messages.create'));
        return redirect()->route('admin.categories.index');
    }

    /**
     * @param $id
     * @return Renderable
     */
    public function edit($id) : Renderable
    {
        $category = $this->category->findOneById($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:categories,name,'.$id,
            'description' => 'sometimes|nullable|string'
        ]);

        $this->category->update($id,$data);
        session()->flash('success',__('messages.update'));
        return redirect()->route('admin.categories.index');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->category->destroy($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('admin.categories.index');
    }

}
