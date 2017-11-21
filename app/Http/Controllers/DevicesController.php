<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteType;

class DevicesController extends Controller {

    public function index() {

        $this->data['departments'] = SiteType::devices()->paginate(5);

        return $this->render('devices.list');
    }

    public function create($id = false) {

        $content = SiteType::devices()->find($id);
        $this->data['title'] = $content ? 'settings.device.edit' : 'settings.device.add';
        $this->data['content'] = $content ? $content : false;
        return $this->render('devices.create');
    }

    public function store(Request $request, $id = false) {

        $this->validate($request, ['title' => 'required']);

        $content = SiteType::devices()->find($id);

        if ($content):
            $content->fill(['type_name' => $request->get('title')])->save();
            $this->setFlash('success', trans('settings.devices.message.update'));
        else:
            SiteType::create([
                'type' => 3,
                'type_name' => $request->get('title')
            ]);
            $this->setFlash('success', trans('settings.devices.message.create'));
        endif;

        return redirect()->route('device.list');
    }

    public function distroy(Request $request, $id = null) {
        $content = SiteType::departments()->find($id);

        if (!$content):
            $this->setFlash('danger', trans('settings.error.invalid'));
        elseif ($content->calls('department')->count()):
            $this->setFlash('danger', trans('settings.error.has_call'));
        else:
            $content->delete();
            $this->setFlash('success', trans('settings.device.message.delete'));
        endif;

        return redirect()->route('device.list');
    }

}
