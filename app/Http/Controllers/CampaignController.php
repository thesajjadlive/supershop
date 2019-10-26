<?php

namespace App\Http\Controllers;

use App\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Campaign List';
        //$data['campaigns'] = Campaign::withTrashed()->orderBy('id','DESC')->paginate(10);

        $campaign = new Campaign();
        $campaign = $campaign->withTrashed();

        //search campaign
        if ($request->has('search') && $request->search != null){
            $campaign = $campaign->where('name','like','%'.$request->search.'%');
        }


        $campaign = $campaign->orderBy('id','DESC')->paginate(10);

        //next pages search issue resolved (this must be after paginate)
        if (isset($request->search)) {
            $render['search'] = $request->search;
            $campaign = $campaign->appends($render);
        }


        $data['campaigns'] =$campaign;
        $data['serial'] = managePagination($campaign);
        return view('backend.campaign.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add New Campaign';
        return view('backend.campaign.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'date'=>'required',
            'file_path'=>'required'
        ]);
        $campaign= $request->except('_token');


        //file upload
        if ($request->hasFile('file_path')){
            $file = $request->file('file_path');
            $file_name = time().'cn'.rand(0000,9999).$file->getClientOriginalName();
            $file->move('images/campaigns/', $file_name);
            $campaign['file_path'] = 'images/campaigns/'.$file_name;
        }


        Campaign::create($campaign);
        session()->flash('message','Campaign Created Successfully!');
        return view('backend.campaign.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $data['title'] = 'Create New Campaign';
        $data['campaign'] = $campaign;
        return view('backend.campaign.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required',
            'date'=>'required'
        ]);
        $campaign_data= $request->except('_token','_method');
        //file upload
        if ($request->hasFile('file_path')){
            $file = $request->file('file_path');
            $file->move('images/campaigns/',$file->getClientOriginalName());
            File::delete($campaign->file);
            $campaign_data['file_path'] = 'images/campaigns/'.$file->getClientOriginalName();
        }

        $campaign->update($campaign_data);
        session()->flash('message','Campaign Updated Successfully!');
        return redirect()->route('campaign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        session()->flash('message','Campaign Deleted Successfully!');
        return redirect()->route('campaign.index');
    }

    public function restore($id)
    {
        $campaign = Campaign::onlyTrashed()->findOrFail($id);
        $campaign->restore();
        session()->flash('message','Campaign Restored Successfully!');
        return redirect()->route('campaign.index');
    }
    public function delete($id)
    {
        $campaign = Campaign::onlyTrashed()->findOrFail($id);
        $campaign->forceDelete();
        session()->flash('message','Camapaign Permanently Removed!');
        return redirect()->route('campaign.index');
    }
}
