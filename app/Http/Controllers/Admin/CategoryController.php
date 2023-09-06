<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listCategory = Category::where(function ($query) use($request){
            if (!empty($request->get('search'))){
                $query->where('name', 'like', "%" . $request->get('search') . "%");
            }
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.category.index', compact('listCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        try {
            $data = $request->all();

            $category = new Category();
            $category->fill($data);

            $category->save();

            return redirect()->route('admin.categories.edit', $category->id)->with('success', 'Thêm thành công');
        } catch (\Exception $exception){
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            abort(404);
        }

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            $data = $request->all();

            $category->fill($data);

            $category->save();

            return redirect()->route('admin.categories.index')->with('success', 'Edit successfully');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();

            return redirect()->back()->with('success', 'Deleted successfully');
        }catch (\Exception $exception){
            Log::error($exception->getMessage());

            if ($exception->getCode() == 23000) {
                return redirect()->back()->with('error', "Không thể xóa #$id vì đang có chứa sản phẩm");
            }

            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
