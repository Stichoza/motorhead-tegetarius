<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller {

    private $repo;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        $this->repo = new EmployeeRepository();
    }

    /**
     * Redirect from homepage
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        return redirect()->route('employee.index');
    }

    /**
     * Render statistics page
     *
     * @return \Illuminate\View\View
     */
    public function statistics() {
        return view('statistics');
    }

    /**
     * Get stats JSON
     *
     * @return array
     */
    public function statisticsJson()
    {

        $faker = Factory::create();

        $cached = Cache::remember('stats', 3, function () {
            return [
                'gender' => $this->repo->genderStats(),
                'salary' => $this->repo->salaryRanges(),
                'dates' => $this->repo->registerDates()
            ];
        });

        foreach ($cached['gender'] as $label => $value) {
            $data['gender'][] = [
                'label' => ['male' => 'მამრობითი', 'female' => 'მდედრობითი'][$label],
                'value' => $value,
                'color' => $faker->hexColor,
            ];
        }

        foreach ($cached['salary'] as $label => $value) {
            $data['salary'][] = [
                'label' => '$' . $label,
                'value' => $value,
                'color' => $faker->hexColor,
            ];
        }

        foreach ($cached['dates'] as $label => $value) {
            $data['dates']['labels'][] = Carbon::parse($label)->format('M Y');
            $data['dates']['datasets'][0]['data'][] = $value;
        }

//        $data['sex'] = array_reduce($cached['sex'], function ($carry, $item) {
//
//            $carry[] = [
//                'label'
//            ];
//
//            return $carry;
//        }, []);

        return $data;

    }

}
