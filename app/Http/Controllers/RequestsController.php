<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteType;

class RequestsController extends Controller {

    public function index() {

        $this->data['departments'] = SiteType::requests()->paginate(5);

        return $this->render('requests.list');
    }

    public function create($id = false) {

        $content = SiteType::requests()->find($id);
        $this->data['title'] = $content ? 'settings.request.edit' : 'settings.request.add';
        $this->data['content'] = $content ? $content : false;
        return $this->render('requests.create');
    }

    public function store(Request $request, $id = false) {

        $this->validate($request, ['title' => 'required']);

        $content = SiteType::requests()->find($id);

        if ($content):
            $content->fill(['type_name' => $request->get('title')])->save();
            $this->setFlash('success', trans('settings.request.message.update'));
        else:
            SiteType::create([
                'type' => 2,
                'type_name' => $request->get('title')
            ]);
            $this->setFlash('success', trans('settings.request.message.create'));
        endif;

        return redirect()->route('request.list');
    }

    public function distroy(Request $request, $id = null) {
        $content = SiteType::departments()->find($id);

        if (!$content):
            $this->setFlash('danger', trans('settings.error.invalid'));
        elseif ($content->calls('department')->count()):
            $this->setFlash('danger', trans('settings.error.has_call'));
        else:
            $content->delete();
            $this->setFlash('success', trans('settings.request.message.delete'));
        endif;

        return redirect()->route('request.list');
    }

}
