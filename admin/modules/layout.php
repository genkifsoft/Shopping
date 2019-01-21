<?php
    $sql = "SELECT count(id) as total FROM `transaction` WHERE `status` = 0 ORDER BY id";
    $transaction = $db->fetchsql($sql);
?>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">26</div>
                        <div>New Comments!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">12</div>
                        <div>New Tasks!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $transaction[0]['total'] ?></div>
                        <div>New Orders!</div>
                    </div>
                </div>
            </div>
            <a href="transaction/index.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">13</div>
                        <div>Support Tickets!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Area Chart</h3>
            </div>
            <div class="panel-body">
                <div id="morris-area-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                    <svg height="342" version="1.1" width="1215" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; top: -0.4px;">
                        <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with RaphaÃ«l 2.1.2</desc>
                        <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                        <text x="49.203125" y="308.40625" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0</tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M61.703125,308.40625H1190" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <text x="49.203125" y="237.5546875" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal">
                            <tspan dy="4.4140625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">7,500</tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M61.703125,237.5546875H1190" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <text x="49.203125" y="166.703125" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">15,000</tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M61.703125,166.703125H1190" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <text x="49.203125" y="95.8515625" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal">
                            <tspan dy="4.4140625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">22,500</tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M61.703125,95.8515625H1190" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <text x="49.203125" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30,000</tspan>
                        </text>
                        <path fill="none" stroke="#aaaaaa" d="M61.703125,25H1190" stroke-width="0.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <text x="1190" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012-06</tspan>
                        </text>
                        <text x="1106.3716775516402" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012-04</tspan>
                        </text>
                        <text x="1024.1143112089915" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2012-02</tspan>
                        </text>
                        <text x="939.115032654921" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-12</tspan>
                        </text>
                        <text x="855.4867102065614" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-10</tspan>
                        </text>
                        <text x="771.8583877582017" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-08</tspan>
                        </text>
                        <text x="688.2300653098421" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-06</tspan>
                        </text>
                        <text x="604.6017428614824" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-04</tspan>
                        </text>
                        <text x="523.7153326245443" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2011-02</tspan>
                        </text>
                        <text x="438.7160540704739" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010-12</tspan>
                        </text>
                        <text x="355.08773162211423" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010-10</tspan>
                        </text>
                        <text x="271.4594091737546" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010-08</tspan>
                        </text>
                        <text x="187.8310867253949" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010-06</tspan>
                        </text>
                        <text x="104.20276427703524" y="320.90625" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#888888" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 12px sans-serif;" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,6.7969)">
                            <tspan dy="4.40625" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">2010-04</tspan>
                        </text>
                        <path fill="#7cb47c" stroke="none" d="M61.703125,258.215003125C93.23511543134873,253.019221875,156.29909629404617,242.236794921875,187.8310867253949,237.431878125C219.36307715674363,232.626961328125,282.42705801944106,226.3533781079235,313.9590484507898,219.77566875C345.14829985571083,213.2694562329235,407.52680266555285,187.03756258200966,438.7160540704739,185.096190625C469.56256644896723,183.17615242575965,531.2555912059538,202.91805770089286,562.1021035844471,204.330028125C593.6340940157959,205.77337566964286,656.6980748784933,195.55624296874998,688.2300653098421,196.5174625C719.7620557411908,197.47868203125,782.8260366038882,229.08264740437158,814.3580270352369,212.019784375C845.5472784401579,195.14238724812157,907.92578125,68.9893734375,939.115032654921,60.756421875C970.3042840598421,52.5234703125,1032.6827868696842,134.08444652066257,1063.872038274605,146.15617187499998C1095.4040287059538,158.36055355191255,1158.4680095686513,154.93468046875,1190,157.86085L1190,308.40625L61.703125,308.40625Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                        <path fill="none" stroke="#4da74d" d="M61.703125,258.215003125C93.23511543134873,253.019221875,156.29909629404617,242.236794921875,187.8310867253949,237.431878125C219.36307715674363,232.626961328125,282.42705801944106,226.3533781079235,313.9590484507898,219.77566875C345.14829985571083,213.2694562329235,407.52680266555285,187.03756258200966,438.7160540704739,185.096190625C469.56256644896723,183.17615242575965,531.2555912059538,202.91805770089286,562.1021035844471,204.330028125C593.6340940157959,205.77337566964286,656.6980748784933,195.55624296874998,688.2300653098421,196.5174625C719.7620557411908,197.47868203125,782.8260366038882,229.08264740437158,814.3580270352369,212.019784375C845.5472784401579,195.14238724812157,907.92578125,68.9893734375,939.115032654921,60.756421875C970.3042840598421,52.5234703125,1032.6827868696842,134.08444652066257,1063.872038274605,146.15617187499998C1095.4040287059538,158.36055355191255,1158.4680095686513,154.93468046875,1190,157.86085" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <circle cx="61.703125" cy="258.215003125" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="187.8310867253949" cy="237.431878125" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="313.9590484507898" cy="219.77566875" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="438.7160540704739" cy="185.096190625" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="562.1021035844471" cy="204.330028125" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="688.2300653098421" cy="196.5174625" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="814.3580270352369" cy="212.019784375" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="939.115032654921" cy="60.756421875" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="1063.872038274605" cy="146.15617187499998" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="1190" cy="157.86085" r="2" fill="#4da74d" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <path fill="#a7b3bc" stroke="none" d="M61.703125,283.22088125C93.23511543134873,277.5385859375,156.29909629404617,265.469022265625,187.8310867253949,260.4917C219.36307715674363,255.514377734375,282.42705801944106,246.1236225922131,313.9590484507898,243.402303125C345.14829985571083,240.71056321721312,407.52680266555285,241.02781021667818,438.7160540704739,238.8394625C469.56256644896723,236.67516256042816,531.2555912059538,229.02704015281594,562.1021035844471,225.9917125C593.6340940157959,222.88893312156594,656.6980748784933,214.15832070312499,688.2300653098421,214.287034375C719.7620557411908,214.415748046875,782.8260366038882,240.17327865437156,814.3580270352369,227.021421875C845.5472784401579,214.01252006062157,907.92578125,117.3573734375,939.115032654921,109.644C970.3042840598421,101.93062656250001,1032.6827868696842,157.21690092640026,1063.872038274605,165.314434375C1095.4040287059538,173.50095170765027,1158.4680095686513,172.4137609375,1190,174.78020312499999L1190,308.40625L61.703125,308.40625Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                        <path fill="none" stroke="#7a92a3" d="M61.703125,283.22088125C93.23511543134873,277.5385859375,156.29909629404617,265.469022265625,187.8310867253949,260.4917C219.36307715674363,255.514377734375,282.42705801944106,246.1236225922131,313.9590484507898,243.402303125C345.14829985571083,240.71056321721312,407.52680266555285,241.02781021667818,438.7160540704739,238.8394625C469.56256644896723,236.67516256042816,531.2555912059538,229.02704015281594,562.1021035844471,225.9917125C593.6340940157959,222.88893312156594,656.6980748784933,214.15832070312499,688.2300653098421,214.287034375C719.7620557411908,214.415748046875,782.8260366038882,240.17327865437156,814.3580270352369,227.021421875C845.5472784401579,214.01252006062157,907.92578125,117.3573734375,939.115032654921,109.644C970.3042840598421,101.93062656250001,1032.6827868696842,157.21690092640026,1063.872038274605,165.314434375C1095.4040287059538,173.50095170765027,1158.4680095686513,172.4137609375,1190,174.78020312499999" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <circle cx="61.703125" cy="283.22088125" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="187.8310867253949" cy="260.4917" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="313.9590484507898" cy="243.402303125" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="438.7160540704739" cy="238.8394625" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="562.1021035844471" cy="225.9917125" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="688.2300653098421" cy="214.287034375" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="814.3580270352369" cy="227.021421875" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="939.115032654921" cy="109.644" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="1063.872038274605" cy="165.314434375" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="1190" cy="174.78020312499999" r="2" fill="#7a92a3" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <path fill="#2577b5" stroke="none" d="M61.703125,283.22088125C93.23511543134873,282.95636875,156.29909629404617,284.81504140625003,187.8310867253949,282.16283125C219.36307715674363,279.51062109375,282.42705801944106,263.1774517247268,313.9590484507898,262.0032C345.14829985571083,260.8417118809768,407.52680266555285,275.0735256819751,438.7160540704739,272.819871875C469.56256644896723,270.59098349447515,531.2555912059538,246.29551240556316,562.1021035844471,244.07303124999999C593.6340940157959,241.80116162431318,656.6980748784933,252.49255859374998,688.2300653098421,254.84246875C719.7620557411908,257.19237890625,782.8260366038882,274.03660872609294,814.3580270352369,262.8723125C845.5472784401579,251.8293673198429,907.92578125,172.941605078125,939.115032654921,166.013503125C970.3042840598421,159.085401171875,1032.6827868696842,199.64826270064893,1063.872038274605,207.447496875C1095.4040287059538,215.33243691939893,1158.4680095686513,223.42452421875,1190,228.7502L1190,308.40625L61.703125,308.40625Z" fill-opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); fill-opacity: 1;"></path>
                        <path fill="none" stroke="#0b62a4" d="M61.703125,283.22088125C93.23511543134873,282.95636875,156.29909629404617,284.81504140625003,187.8310867253949,282.16283125C219.36307715674363,279.51062109375,282.42705801944106,263.1774517247268,313.9590484507898,262.0032C345.14829985571083,260.8417118809768,407.52680266555285,275.0735256819751,438.7160540704739,272.819871875C469.56256644896723,270.59098349447515,531.2555912059538,246.29551240556316,562.1021035844471,244.07303124999999C593.6340940157959,241.80116162431318,656.6980748784933,252.49255859374998,688.2300653098421,254.84246875C719.7620557411908,257.19237890625,782.8260366038882,274.03660872609294,814.3580270352369,262.8723125C845.5472784401579,251.8293673198429,907.92578125,172.941605078125,939.115032654921,166.013503125C970.3042840598421,159.085401171875,1032.6827868696842,199.64826270064893,1063.872038274605,207.447496875C1095.4040287059538,215.33243691939893,1158.4680095686513,223.42452421875,1190,228.7502" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                        <circle cx="61.703125" cy="283.22088125" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="187.8310867253949" cy="282.16283125" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="313.9590484507898" cy="262.0032" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="438.7160540704739" cy="272.819871875" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="562.1021035844471" cy="244.07303124999999" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="688.2300653098421" cy="254.84246875" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="814.3580270352369" cy="262.8723125" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="939.115032654921" cy="166.013503125" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="1063.872038274605" cy="207.447496875" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                        <circle cx="1190" cy="228.7502" r="2" fill="#0b62a4" stroke="#ffffff" stroke-width="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                    </svg>
                    <div class="morris-hover morris-default-style" style="left: 506.102px; top: 141px; display: none;">
                        <div class="morris-hover-row-label">2011 Q1</div>
                        <div class="morris-hover-point" style="color: #0b62a4">
                            iPhone:
                            6,810
                        </div>
                        <div class="morris-hover-point" style="color: #7A92A3">
                            iPad:
                            1,914
                        </div>
                        <div class="morris-hover-point" style="color: #4da74d">
                            iPod Touch:
                            2,293
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>