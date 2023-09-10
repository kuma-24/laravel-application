<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Administrator;
use App\Http\Requests\CampaignRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('administrator.administrator_account')->get();
        return view('dashboard.campaign.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        $campaign = Campaign::with('administrator.administrator_account')->findOrFail($campaign->id);
        return view('dashboard.campaign.show', compact('campaign'));
    }

    public function create()
    {
        return view('dashboard.campaign.create');
    }

    public function store(CampaignRequest $request)
    {
        $thumbnailName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();;
        $request->file('thumbnail')->storeAs('public/campaign/thumbnails/', $thumbnailName);;
        $thumbnailPathName = "storage/campaign/thumbnails/{$thumbnailName}";

        $campaignRequest = $request->all();
        $campaignRequest['administrator_id'] = Auth::user()->id;
        $campaignRequest['thumbnail'] = $thumbnailPathName;

        $campaign = new Campaign;
        $campaign->fill($campaignRequest)->save();
  
        return redirect()->route('campaign.index');
    }

    public function edit(Campaign $campaign)
    {
        $this->authorize('update', $campaign);
        $campaign = Campaign::with('administrator.administrator_account')->findOrFail($campaign->id);

        return view('dashboard.campaign.edit', compact('campaign'));
    }

    public function update(CampaignRequest $request, Campaign $campaign)
    {
        $this->authorize('update', $campaign);

        $campaignRequest = $request->all();

        if ($request->hasFile('thumbnail')) {
            unlink($campaign->thumbnail);
            $thumbnailName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();;
            $request->file('thumbnail')->storeAs('public/campaign/thumbnails/', $thumbnailName);;
            $thumbnailPathName = "storage/campaign/thumbnails/{$thumbnailName}";
            $campaignRequest['thumbnail'] = $thumbnailPathName;
        }

        $campaignRequest['administrator_id'] = Auth::user()->id;
        $campaign->fill($campaignRequest)->save();

        return redirect()->route('campaign.show', $campaign->id);
    }

    public function delete(Campaign $campaign)
    {
        unlink($campaign->thumbnail);
        $campaign->delete();
        return redirect()->route('campaign.index');
    }
}