<?php 
//phpGraph is a php library that generate svg graphic (line, histogram or pie)

# ------------------ BEGIN LICENSE BLOCK ------------------
#     ___________________________________________________                  
#    |                                                  |
#    |                  PHP GRAPH       ____            |
#    |                                 |    |           |
#    |                        ____     |    |           |
#    |               /\      |    |    |    |           |
#    |             /   \     |    |    |    |           |
#    |      /\   /      \    |    |____|    |           |
#    |    /   \/         \   |    |    |    |           |
#    |  /                 \  |    |    |    |           |
#    |/____________________\_|____|____|____|___________|
#
# @update     2013-12-17
# @copyright  2013 Cyril MAGUIRE
# @licence    http://www.cecill.info/licences/Licence_CeCILL_V2.1-fr.txt CONTRAT DE LICENCE DE LOGICIEL LIBRE CeCILL version 2.1
# @link       http://phpgraph.ecsyeo.net
# @version    1.0
#
# ------------------- END LICENSE BLOCK -------------------

//First we include the library
include('phpGraph.php');

//First sample
$flot = array(
    "0" => array(
            "0" => 2000,
            "1" => 10,
        ),

    "1" => array(
            "0" => 2002,
            "1" => 39,
        ),

    "2" => array(
            "0" => 2003,
            "1" => 47,
        ),

    "3" => array(
            "0" => 2004,
            "1" => 53,
        ),

    "4" => array(
            "0" => 2005,
            "1" => 46,
        ),

    "5" => array(
            "0" => 2006,
            "1" => 10,
        ),

    "6" => array(
            "0" => 2007,
            "1" => 98,
        ),

    "7" => array(
            "0" => 2008,
            "1" => -20,
        ),

    "8" => array(
            "0" => 2009,
            "1" => 16,
        ),

    "9" => array(
            "0" => 2010,
            "1" => 16,
        ),

    "10" => array(
            "0" => 2011,
            "1" => 12,
        ),

    "11" => array(
            "0" => 2012,
            "1" => 12,
        ),

    "12" => array(
            "0" => 2013,
            "1" => 2,
        ),

);
//We transforme multidimensionnal array to unidimensionnal array
$dataFirst  = array();
foreach ($flot as $key => $value) {
    $dataFirst[$value[0]] = $value[1];
}

//An other array
$data[0] = array(
    "2000" => 0,
    "2002" => 25,
    "2003" => 32,
    "2004" => 1,
    "2005" => 58,
    "2006" => 31,
    "2007" => 79,
    "2008" => 51,
    "2009" => 54,
    "2010" => 12,
    "2011" => 17,
    "2012" => 14,
    "2013" => 13
);
$data[1] = array(
    "2000" => 0,
    "2002" => 0,
    "2003" => 0,
    "2004" => 20,
    "2005" => 0,
    "2006" => 40,
    "2007" => 50,
    "2008" => 0,
    "2009" => 60,
    "2010" => 0,
    "2011" => 0,
    "2012" => 0,
    "2013" => 0
);
$data[2] = array(
    "2000" => 0,
    "2002" => -20,
    "2003" => -30,
    "2004" => 65,
    "2005" => 0,
    "2006" => 10,
    "2007" => 10,
    "2008" => 18,
    "2009" => 39,
    "2010" => 0,
    "2011" => 23,
    "2012" => 36,
    "2013" => 54
);
$data[3] = array(
    "2000" => 0,
    "2002" => 0,
    "2003" => 3,
    "2004" => 1,
    "2005" => 5,
    "2006" => 2,
    "2007" => 3,
    "2008" => 3,
    "2009" => -5,
    "2010" => 8,
    "2011" => 9,
    "2012" => 5,
    "2013" => 2
);
$data[4] = array(
    "2000" => 0,
    "2002" => 0,
    "2003" => 0,
    "2004" => 0,
    "2005" => 0,
    "2006" => 0,
    "2007" => 46,
    "2008" => 10,
    "2009" => 7,
    "2010" => 4,
    "2011" => 5,
    "2012" => 6,
    "2013" => 0
);
$d = array(
    "2000" => -7,
    "2001" => 15,
    "2002" => 39,
    "2003" => 26,
    "2004" => 36,
    "2005" => 18,
    "2006" => 32,
    "2007" => 56,
    "2008" => 38,
    "2009" => 103,
    "2010" => 105,
    "2011" => 126,
    "2012" => 125,
    "2013" => 76
);

//All options available
$options = array(
    'width' => null,// (int) width of grid
    'height' => null,// (int) height of grid
    'paddingTop' => 10,// (int)
    'type' => 'line',// (string) line, bar, pie or ring
    'steps' => 5,// (int) 2 graduations on y-axis are separated by $steps units
    'filled' => true,// (bool) to fill lines/histograms/disks
    'tooltips' => false,// (bool) to show tooltips
    'circles' => true,// (bool) to show circles on graph (lines or histograms)
    'stroke' => '#3cc5f1',// (string) color of lines by default. Use an array to personalize each line
    'background' => "#ffffff",// (string) color of grid background. Don't use short notation (#fff) because of $this->__genColor();
    'gradient' => null,// (array) 2 colors from left to right
    'titleHeight' => 0,// (int) Height of main title
    'tooltipLegend' => '',// (string or array) Text display in tooltip with y value. Each text can be personalized using an array.
    'legends' => '',// (string or array) General legend for each line/histogram/disk displaying under diagram
    'title' => null,// (string) Main title. Title wil be displaying in a tooltip too.
    'radius' => 100,// (int) Radius of pie
    'diskLegends' => false,// (bool) to display legends around a pie
    'diskLegendsType' => 'label',// (string) "data", "pourcent" or "label" to display around a pie as legend
);

//We call an instance of phpGraph() class
$G = new phpGraph();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>phpGraph</title>
    <link rel="stylesheet" type="text/css" href="phpGraph_style.css" media="all">
</head>
<body>
    <?php
    //This is only to see code of the page. You can delet it.
    //highlight_string(file_get_contents('samples.php'));

    // //Then we draw charts
    echo '<h1>Multi lines with histogram and pie</h1>';

    echo $G->draw($data,array(
            'steps' => 50,
            'filled'=>false,
            'tooltips'=>true,
            'diskLegends' => true,
            'diskLegendsType' => 'label',
            'type' => array(
                '2'=>'bar',
                '3'=>'pie',
                '4'=>'ring',
            ),
            'stroke' => array(
                '0'=>'red',
                '1'=>'blue',
                '2'=>'orange',
                '3'=>'green',
                '4'=>'deeppink'
            ),
            'legends' => array(
                '0'=>'Serie 1',
                '1'=>'Serie 2',
                '2'=>'Serie 3',
                '3'=>'Serie 4',
                '4'=>'Serie 5',
            ),
            'tooltipLegend' => array(
                '0'=>'Sample of legend : ',
                '1'=>'Sample of legend : ',
                '2'=>'Sample of legend : ',
                '3'=>'Sample of legend : ',
                '4'=>'Sample of legend : ',
            ),
            'title' => 'Amazing phpGraph',
        )
    );
    echo '<h1>Multi lines filled with no legend nor tooltip. Gradient as background</h1>';

    echo $G->draw($data,array(
            //'steps' => 50,
            'filled' => true,
            'circles' => false,
            'gradient' => array('green', '#00FF00')
        )
    );

    echo '<h1>Histogram</h1>';

    echo $G->draw($dataFirst,array(
            'filled' => true,
            'type' => 'bar',
            'tooltips' => true,
            'legends' => 'Visits by year',
            'tooltipLegend' => 'Total : ',
            'title' => '',
            'width' => 900,
            'height' => 900,
        ));

    echo '<h1>Same data as a pie</h1>';

    echo $G->draw($dataFirst,array(
            'type' => 'pie',
            'title' => 'A beautifull pie with phpGraph',
            'tooltips'=> true,
            'tooltipLegend' => 'Happy users : ',
            'stroke' => array(
                '0'=>'red',
                '1'=>'blue',
                '2'=>'orange',
                '3'=>'green',
                '4'=>'deeppink'
            ),
            'legends' => true,
            'diskLegends' => true,
            'diskLegendsType' => 'pourcent',
            'gradient' => array('grey', 'white')
        )
    );
    echo $G->draw($d,array(
            'responsive' => false,
            'filled' => true,
            'opacity'=>0.9,
            'tooltips' => true,
            'type' => 'line',
            //'steps' => 20
            //'legends' => 'Nombre de patients par an'
        ));
    //Results above...
    ?>

</body>
</html>