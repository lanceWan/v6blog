<?php

namespace App\Http\Controllers\Admin;
use App\Model\Setting;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function about(Request $request)
    {
        $about = Setting::where(['key' => 'about'])->first();
        if ($request->isMethod('POST')) {
            if ($about) {
                $about->fill(['content' => $request->editormd])->update();
                flash('修改成功！')->success();
            }else{
                $about = Setting::create([
                    'key' => 'about',
                    'content' => $request->editormd
                    ]);
                flash('创建成功！')->success();
            }
        }
        return $request->isMethod('POST') ? redirect()->route('admin.about', compact('about')): view('admin.setting.about', compact('about'));
    }

    public function system(Request $request)
    {
        if ($request->isMethod('POST')) {
            $items = $request->except('_token');
            if ($request->hasFile('adv_image')) {
                $items['adv_image'] = $request->adv_image->store('images');
            }else{
                $items =  Arr::except($items, ['adv_image']);
            }
            collect($items)->each(function ($item, $key)
            {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['content' => $item]
                );
            });
            // 删除缓存
            cache()->forget('settings');
            flash('修改成功！')->success();
        }

        $settings = Setting::pluck('content', 'key')->all();
        return $request->isMethod('POST') ? redirect()->route('admin.system', compact('settings')): view('admin.setting.system', compact('settings'));
    }
}
