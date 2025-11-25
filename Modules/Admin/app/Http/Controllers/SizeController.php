<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SizeRequest;
use Modules\Admin\Services\SizeService;

class SizeController extends Controller
{
    public function __construct(
        protected SizeService $sizeService
    ) {
    }

    public function index()
    {
        $size = $this->sizeService->getAllSizes();
        return view('admin::admin.size.index', compact('size'));
    }
    
    public function create()
    {
        return view('admin::admin.size.create');
    }
    
    public function store(SizeRequest $request)
    {
        $this->sizeService->createSize($request->validated());
        return redirect()->route('size.index');
    }
    
    public function edit($id)
    {
        $size = $this->sizeService->getSizeById($id);
        return view('admin::admin.size.edit', compact('size'));
    }
    
    public function update($id, SizeRequest $request)
    {
        $this->sizeService->updateSize($id, $request->validated());
        return redirect()->route('size.index');
    }
    
    public function destroy($id)
    {
        $this->sizeService->deleteSize($id);
        return redirect()->route('size.index');
    }
}

