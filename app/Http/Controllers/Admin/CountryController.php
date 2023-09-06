<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listCountry = Country::where(function ($query) use($request){
            if (!empty($request->get('search'))){
                $query->where('name', 'like', "%" . $request->get('search') . "%");
            }
        })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.country.index', compact('listCountry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CountryStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request)
    {
        try {
            $data = $request->all();

            $country = new Country();
            $country->fill($data);

            $country->save();

            return redirect()->route('admin.countries.edit', $country->id)->with('success', 'Thêm thành công');
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
        $country = Country::find($id);

        if (empty($country)) {
            abort(404);
        }

        return view('admin.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CountryStoreRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryStoreRequest $request, $id)
    {
        try {
            $country = Country::find($id);
            $data = $request->all();

            $country->fill($data);

            $country->save();

            return redirect()->route('admin.countries.index')->with('success', 'Edit successfully');
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
            $country = Country::find($id);
            $country->delete();

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
