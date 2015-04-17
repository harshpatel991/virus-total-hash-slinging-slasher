<?php
class resultListItem {

    /**
     * @param $isFirst Set to true if this is the first item in the list (sets it's accordion to open)
     * @param $uniqueID A unique id to identify each result list item
     * @param $title The title that appears in the list
     * @param $content The content that appears below the title
     * @param $percentGood The percentage of scanners that found the item to not be a virus
     * @param $percentBad The percentage of scanners that found the item to be a virus
     */
    public static function newItem($isFirst, $uniqueID, $title, $vtResults, $percentGood, $percentBad) {
        $collapse = '';
        $in = '';
        if(!$isFirst) {
            $collapse = 'class="collapsed"';
        }
        else {
            $in = 'in';
        }

        return '<div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a '.$collapse.' data-toggle="collapse" data-parent="#accordion" href="#'.$uniqueID.'">

                        <div class="progress">
                            <div class="progress-bar progress-bar-success" style="width: '.$percentGood.'%">
                                <span class="sr-only">'.$percentGood.'% Complete (success)</span>
                            </div>
                            <div class="progress-bar progress-bar-danger" style="width: '.$percentBad.'%">
                                <span class="sr-only">'.$percentBad.'% Complete (danger)</span>
                            </div>
                        </div><span class="glyphicon glyphicon-collapse-down"></span> '
                        .$title.
                    '</a>
                </h4>
            </div>

            <div id="'.$uniqueID.'" class="panel-collapse collapse '.$in.'" role="tabpanel">
                <div class="panel-body">'
                    .self::newScanResultsTable($vtResults).
                '</div>
            </div>

            </div>';
    }

    /**
     * @param $vtResults An array of result items from the Virus Total Scan
     * @return string A string representing an HTML table populated with the values passed in
     */
    private static function newScanResultsTable($vtResults) {
        $table = '<table class="table">';
        $table .=  '<tr><th>Scanner</th><th>Detected</th><th>Version</th><th>Result</th></tr>';

        foreach ($vtResults as $result) {
            $table .= '<tr><td id="td-no-border">'.$result['scanner'].'</td><td id="td-no-border">'.$result['detected'].'</td><td id="td-no-border">'.$result['version'].'</td><td id="td-no-border">'.$result['result'].'</td></tr>';
        }

        $table .= '</table>';
        return $table;
    }

}