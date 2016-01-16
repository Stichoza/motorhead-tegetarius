<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Main page for employees.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Employee JSON.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function json()
    {
        return Employee::all()->map(function ($item) {
            $item->sex = [
                'female' => '<i class="fa fa-fw fa-female"></i> მდედრ.',
                'male'   => '<i class="fa fa-fw fa-male"></i> მამრ.',
            ][$item->sex];

            $item->actions = view('partials.actions')->withId($item->id)->render();

            return $item;
        });
    }

    /**
     * Employee creation route.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $form = $request->session()->get('_old_input', []);

        return view('create')->withForm($form);
    }

    /**
     * Show editing view (for popup).
     *
     * @param Request $request
     * @param $id
     *
     * @return mixed
     */
    public function edit(Request $request, $id)
    {
        $employee = Employee::with('addresses', 'courses')->findOrFail($id);

        $modelData = $employee->toArray();

        foreach ($modelData['addresses'] as $key => $value) {
            $modelData['address'][] = $value;
        }

        foreach ($modelData['courses'] as $key => $value) {
            $modelData['course'][] = $value;
        }

        $form = array_merge($modelData, $request->session()->get('_old_input', []));

        if ($request->session()->has('pop')) {
            return view('create')
                ->withForm($form)
                ->withCompact(👍); // It's just a thumps-up emoji
        } else {
            $request->session()->reflash();

            return redirect()->route('employee.edit', ['id' => $id])
                ->withInput($form)
                ->withPop(👍); // It's just a thumps-up emoji
        }
    }

    /**
     * Store created model.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, EmployeeRepository::rules($request->all()));
        $employee = EmployeeRepository::save($request->all());

        return redirect()
            ->route('employee.index')
            ->with('message', 'messages.employee.created');
    }

    /**
     * Update existing model.
     *
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, EmployeeRepository::rules($request->all()));
        $employee = EmployeeRepository::save($request->all(), $id);

        return redirect()
            ->route('employee.edit', ['id' => $id])
            ->with('message', 'messages.employee.updated');
    }

    /**
     * Just dump a json of an object.
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return Employee::with('addresses', 'courses')->findOrFail($id);
    }

    /**
     * This is sparta!!!
     *
     * @param Request $request
     * @param $id
     *
     * @return string
     */
    public function destroy(Request $request, $id)
    {
        if (Employee::findOrFail($id)->delete()) {
            return trans('messages.employee.deleted');
        }
    }
}
