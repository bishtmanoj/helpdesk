<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteType;

class DepartmentsController extends Controller {

    public function index() {

        $this->data['departments'] = SiteType::departments()->paginate(5);

        return $this->render('departments.list');
    }

    public function create($id = false) {

        $content = SiteType::departments()->find($id);
        $this->data['title'] = $content ? 'settings.department.edit' : 'settings.department.add';
        $this->data['content'] = $content ? $content : false;
        return $this->render('departments.create');
    }

    public function store(Request $request, $id = false) {

        $this->validate($request, ['title' => 'required']);

        $content = SiteType::departments()->find($id);

        if ($content):
            $content->fill(['type_name' => $request->get('title')])->save();
            $this->setFlash('success', trans('settings.department.message.update'));
        else:
            SiteType::create([
                'type' => 1,
                'type_name' => $request->get('title')
            ]);
            $this->setFlash('success', trans('settings.department.message.create'));
        endif;

        return redirect()->route('department.list');
    }

    public function distroy(Request $request, $id = null) {
        $content = SiteType::departments()->find($id);

        if (!$content):
            $this->setFlash('danger', trans('settings.error.invalid'));
        elseif ($content->calls('department')->count()):
            $this->setFlash('danger', trans('settings.error.has_call'));
        else:
            $content->delete();
            $this->setFlash('success', trans('settings.department.message.delete'));
        endif;

        return redirect()->route('department.list');
    }

}
