<?php
    namespace App\Http\Controllers;

    use Carbon\Carbon;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;

    class Controller extends BaseController{
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
         * Create the a date format text.
         * @param $idiom - The date idiom.
         * @param $obj - The object.
         */
        public function createDate($idiom, $obj){
            Carbon::setLocale($idiom);
            $date = new Carbon($obj->updated_at);
            $date = $date->diffForHumans();
            return $date;
        }

        /**
         * Create the a date format text.
         * @param $idiom - The date idiom.
         * @param $obj - The object.
         */
        public function transformDate($idiom, $obj){
            $date = new Carbon($obj->fecha);
            $day = $date->format('d');
            $month = $date->formatLocalized('%B');
            $year = $date->format('Y');
            return (object) [
                'day' => $day,
                'month' => $month,
                'year' => $year,
            ];
        }
    }