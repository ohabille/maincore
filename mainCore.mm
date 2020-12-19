<map version="freeplane 1.7.0">
<!--To view this file, download free mind mapping software Freeplane from http://freeplane.sourceforge.net -->
<node TEXT="MainCore" STYLE_REF="directory/" FOLDED="false" ID="ID_780283499" CREATED="1604307329940" MODIFIED="1607241108878" VGAP_QUANTITY="10.0 pt"><hook NAME="MapStyle" zoom="1.507">
    <properties fit_to_viewport="false" show_icon_for_attributes="true" show_note_icons="true" edgeColorConfiguration="#808080ff,#ff0000ff,#0000ffff,#00ff00ff,#ff00ffff,#00ffffff,#7c0000ff,#00007cff,#007c00ff,#7c007cff,#007c7cff,#7c7c00ff"/>

<map_styles>
<stylenode LOCALIZED_TEXT="styles.root_node" STYLE="oval" UNIFORM_SHAPE="true" VGAP_QUANTITY="24.0 pt">
<font SIZE="24"/>
<stylenode LOCALIZED_TEXT="styles.predefined" POSITION="right" STYLE="bubble">
<stylenode LOCALIZED_TEXT="default" ICON_SIZE="12.0 pt" COLOR="#000000" STYLE="fork">
<font NAME="SansSerif" SIZE="10" BOLD="false" ITALIC="false"/>
</stylenode>
<stylenode LOCALIZED_TEXT="defaultstyle.details"/>
<stylenode LOCALIZED_TEXT="defaultstyle.attributes">
<font SIZE="9"/>
</stylenode>
<stylenode LOCALIZED_TEXT="defaultstyle.note" COLOR="#000000" BACKGROUND_COLOR="#ffffff" TEXT_ALIGN="LEFT"/>
<stylenode LOCALIZED_TEXT="defaultstyle.floating">
<edge STYLE="hide_edge"/>
<cloud COLOR="#f0f0f0" SHAPE="ROUND_RECT"/>
</stylenode>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.user-defined" POSITION="right" STYLE="bubble">
<stylenode TEXT="directory/" BACKGROUND_COLOR="#00d7af" STYLE="rectangle" SHAPE_HORIZONTAL_MARGIN="5.0 pt" SHAPE_VERTICAL_MARGIN="5.0 pt" TEXT_ALIGN="CENTER" VGAP_QUANTITY="10.0 pt" BORDER_WIDTH="3.0 px" BORDER_COLOR_LIKE_EDGE="false" BORDER_COLOR="#00d7af">
<font NAME="Arial" SIZE="18"/>
<edge STYLE="bezier" COLOR="#00d7af"/>
</stylenode>
<stylenode TEXT="php file" BACKGROUND_COLOR="#396193" STYLE="fork" BORDER_COLOR_LIKE_EDGE="false" BORDER_COLOR="#396193">
<font NAME="Arial Black" ITALIC="false"/>
<edge COLOR="#396193" WIDTH="1"/>
<cloud COLOR="#396193" SHAPE="ROUND_RECT"/>
</stylenode>
<stylenode TEXT="ini file" BACKGROUND_COLOR="#008ced" STYLE="fork" BORDER_WIDTH="1.0 px" BORDER_COLOR_LIKE_EDGE="true" BORDER_DASH_LIKE_EDGE="true">
<font NAME="Calibri" SIZE="12" BOLD="true" ITALIC="true"/>
<edge STYLE="bezier" COLOR="#008ced" WIDTH="1"/>
<cloud COLOR="#008ced" SHAPE="ROUND_RECT"/>
</stylenode>
<stylenode TEXT="commentaires" COLOR="#666666" BACKGROUND_COLOR="#000000" TEXT_ALIGN="LEFT">
<font NAME="Calibri" SIZE="12" BOLD="true"/>
<edge COLOR="#000000"/>
</stylenode>
<stylenode TEXT="code" COLOR="#00cc00" BACKGROUND_COLOR="#000000" TEXT_ALIGN="LEFT">
<font NAME="Calibri" SIZE="12" BOLD="true"/>
<edge COLOR="#000000"/>
</stylenode>
<stylenode TEXT="function" COLOR="#00cccc" BACKGROUND_COLOR="#000000" BORDER_COLOR_LIKE_EDGE="true" BORDER_COLOR="#000000">
<font NAME="Calibri" SIZE="12" BOLD="true" ITALIC="true"/>
<edge COLOR="#000000"/>
</stylenode>
<stylenode TEXT="property" COLOR="#ff0000" BACKGROUND_COLOR="#000000" BORDER_COLOR_LIKE_EDGE="true" BORDER_COLOR="#000000">
<font NAME="Calibri" SIZE="12" BOLD="true" ITALIC="true"/>
<edge COLOR="#000000"/>
</stylenode>
</stylenode>
<stylenode LOCALIZED_TEXT="styles.AutomaticLayout" POSITION="right" STYLE="bubble">
<stylenode LOCALIZED_TEXT="AutomaticLayout.level.root" COLOR="#000000" BACKGROUND_COLOR="#cccccc" STYLE="oval" SHAPE_HORIZONTAL_MARGIN="10.0 pt" SHAPE_VERTICAL_MARGIN="10.0 pt">
<font SIZE="18"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,1" COLOR="#0033ff">
<font SIZE="16"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,2" COLOR="#00b439">
<font SIZE="14"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,3" COLOR="#990000">
<font SIZE="12"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,4" COLOR="#111111">
<font SIZE="10"/>
</stylenode>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,5"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,6"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,7"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,8"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,9"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,10"/>
<stylenode LOCALIZED_TEXT="AutomaticLayout.level,11"/>
</stylenode>
</stylenode>
</map_styles>
</hook>
<hook NAME="AutomaticEdgeColor" COUNTER="76" RULE="ON_BRANCH_CREATION"/>
<node TEXT="core/" STYLE_REF="directory/" POSITION="right" ID="ID_710613636" CREATED="1606724952394" MODIFIED="1607169419193">
<edge COLOR="#007c00"/>
<node TEXT="Ports/" STYLE_REF="directory/" ID="ID_751145579" CREATED="1606726730204" MODIFIED="1607241204439">
<node TEXT="implementsFuncs.php" STYLE_REF="php file" FOLDED="true" ID="ID_861476354" CREATED="1606726773659" MODIFIED="1606727131051">
<node TEXT="namespace MainPorts" STYLE_REF="code" ID="ID_405728123" CREATED="1606727150060" MODIFIED="1607928863018"/>
<node TEXT="interface ImplementsFuncs" STYLE_REF="function" ID="ID_530440705" CREATED="1606726879315" MODIFIED="1606726919699">
<node TEXT="public function setMethodsAlias () : void" STYLE_REF="function" ID="ID_1998976733" CREATED="1606727014635" MODIFIED="1606727044186"/>
</node>
</node>
<node TEXT="ImplementSingleTon.php" STYLE_REF="php file" FOLDED="true" ID="ID_253145381" CREATED="1607928784623" MODIFIED="1607928832774">
<node TEXT="namespace MainPorts" STYLE_REF="code" ID="ID_1469986901" CREATED="1607928841526" MODIFIED="1607928856749"/>
<node TEXT="interface ImplementSingleTon" STYLE_REF="function" ID="ID_1983453708" CREATED="1607928872119" MODIFIED="1607928889584">
<node TEXT="public static getInstance () : \MainPorts\ImplementSingleTon" STYLE_REF="function" ID="ID_1482857806" CREATED="1606726961181" MODIFIED="1607928940576"/>
<node TEXT="public static function setInstance() : \MainPorts\ImplementSingleTon" STYLE_REF="function" ID="ID_1396520799" CREATED="1607928958854" MODIFIED="1607929010509"/>
</node>
</node>
</node>
<node TEXT="libs/" STYLE_REF="directory/" ID="ID_670278374" CREATED="1607075573963" MODIFIED="1607241227087">
<node TEXT="ParseConfs.php" STYLE_REF="php file" FOLDED="true" ID="ID_561398357" CREATED="1606726648203" MODIFIED="1607076547886">
<node TEXT="namespace MainLib" STYLE_REF="code" ID="ID_25725597" CREATED="1606729896888" MODIFIED="1607166182169"/>
<node TEXT="class ParseConfs&#xa;implements \MainPorts\ImplementsFuncs, \MainPorts\ImplementSingleTon" STYLE_REF="function" ID="ID_1131807612" CREATED="1606729923991" MODIFIED="1607929129886" LINK="#ID_861476354">
<node TEXT="use \MainTraits\MainFuncs" STYLE_REF="code" ID="ID_1524128688" CREATED="1606729945224" MODIFIED="1607166243696"/>
<node TEXT="private static $instance" STYLE_REF="property" ID="ID_573100557" CREATED="1606730242985" MODIFIED="1607166251011"/>
<node TEXT="public function parseJson ( string $filePath ) : \stdClass" STYLE_REF="function" ID="ID_1045242682" CREATED="1606730278136" MODIFIED="1607166807025">
<node TEXT="$file = ROOTDIRS/$filePath.json" STYLE_REF="code" ID="ID_447564186" CREATED="1606730355776" MODIFIED="1606730407740"/>
<node TEXT="if (!file_exists ( $file ) )" STYLE_REF="function" ID="ID_1733120646" CREATED="1606730463048" MODIFIED="1606730486101">
<node TEXT="return json_decode ( array )" STYLE_REF="code" ID="ID_1247022309" CREATED="1606730492161" MODIFIED="1606730530573"/>
</node>
<node TEXT="return json_decode ( file_get_contents ( $file ) )" STYLE_REF="code" ID="ID_1243070946" CREATED="1606730533296" MODIFIED="1606730578670"/>
</node>
<node TEXT="public function getJsConf (string $filePath ) : \stdClass" STYLE_REF="function" ID="ID_993466250" CREATED="1606730584336" MODIFIED="1607166822985">
<node TEXT="return parseJson ( confs/$filePath )" STYLE_REF="code" ID="ID_747126607" CREATED="1606730622897" MODIFIED="1606730669885"/>
</node>
</node>
</node>
<node TEXT="Dumps.php" STYLE_REF="php file" FOLDED="true" ID="ID_1988182982" CREATED="1606726687755" MODIFIED="1607076544456">
<node TEXT="namespace MainLib" STYLE_REF="code" ID="ID_1891982085" CREATED="1606731015273" MODIFIED="1607166445017"/>
<node TEXT="class Dumps&#xa;implements \MainPorts\ImplementsFuncs,&#xa;\MainTraits\ImplementSingleTon" STYLE_REF="function" ID="ID_1001677935" CREATED="1606731032009" MODIFIED="1607929211525" LINK="#ID_861476354">
<node TEXT="use \MainTraits\MainFuncs" STYLE_REF="code" ID="ID_909651836" CREATED="1606729945224" MODIFIED="1607166516200"/>
<node TEXT="private static $instance" STYLE_REF="property" ID="ID_90465963" CREATED="1606730242985" MODIFIED="1607166521304"/>
<node TEXT="private $_patt" STYLE_REF="property" ID="ID_782205290" CREATED="1606731248146" MODIFIED="1607166526755">
<node TEXT="array" STYLE_REF="code" ID="ID_46528097" CREATED="1606731268754" MODIFIED="1606731277299">
<node TEXT="#(\[)(&quot;?(_|[a-z0-9])[a-zA-Z0-9]*&quot;?)#" STYLE_REF="code" ID="ID_964379096" CREATED="1606731279482" MODIFIED="1607166532944"/>
<node TEXT="#([a-z][a-z]+)(\([0-9]+\))#" STYLE_REF="code" ID="ID_1103280307" CREATED="1606731339242" MODIFIED="1607166536019"/>
<node TEXT="#([a-z]+)(\(([\\a-zA-Z]+)\)\#[0-9]+\h\([0-9]+\))#" STYLE_REF="code" ID="ID_819724818" CREATED="1606731410026" MODIFIED="1607166537523"/>
</node>
</node>
<node TEXT="private $_htmlRempls" STYLE_REF="property" ID="ID_628256369" CREATED="1607167474177" MODIFIED="1607167494726">
<node TEXT="array" STYLE_REF="code" ID="ID_615116456" CREATED="1607167496537" MODIFIED="1607167501691">
<node TEXT="&lt;br /&gt;$1&lt;span style=&quot;color: red;&quot;&gt;$2&lt;/span&gt;" STYLE_REF="code" ID="ID_1012879052" CREATED="1607167503057" MODIFIED="1607167551310"/>
<node TEXT="&lt;br /&gt;&lt;span style=&quot;color:palevioletred;&quot;&gt;$1&lt;/span&gt;$2" STYLE_REF="code" ID="ID_1878642080" CREATED="1607167554224" MODIFIED="1607167574493"/>
<node TEXT="&lt;br /&gt;&lt;span style=&quot;color:blue;&quot;&gt;$1&lt;/span&gt;$2&#xa;&lt;span style=&quot;color:mediumvioletred;&quot;&gt;$3&lt;/span&gt;$4&#xa;&lt;span style=&quot;color:blue;&quot;&gt;$5&lt;/span&gt;$6" STYLE_REF="code" ID="ID_1297544591" CREATED="1607167576136" MODIFIED="1607167658274"/>
<node TEXT="&lt;div&gt;{&lt;div style=&quot;margin-left: 50px;&quot;&gt;" STYLE_REF="code" ID="ID_258269014" CREATED="1607167715305" MODIFIED="1607167731316"/>
<node TEXT="&lt;/div&gt;}&lt;/div&gt;" STYLE_REF="code" ID="ID_1373905337" CREATED="1607167737672" MODIFIED="1607167748950"/>
</node>
</node>
<node TEXT="public function dump ( $var, bool $exit = true ) : void" STYLE_REF="function" ID="ID_659108779" CREATED="1606731687394" MODIFIED="1606731723260">
<node TEXT="echo" STYLE_REF="function" ID="ID_448825882" CREATED="1606780501049" MODIFIED="1606780508281">
<node TEXT="preg_replace" STYLE_REF="function" ID="ID_124415051" CREATED="1606780510718" MODIFIED="1606780528792">
<node TEXT="$this-&gt;_patts" STYLE_REF="property" ID="ID_515525142" CREATED="1606780529995" MODIFIED="1607167405705"/>
<node TEXT="$this-&gt;getRempls ()" STYLE_REF="code" ID="ID_262494802" CREATED="1606780544757" MODIFIED="1607167433755"/>
<node TEXT="$this-&gt;getDump ( $var )" STYLE_REF="code" ID="ID_166326763" CREATED="1606780645745" MODIFIED="1607167465714"/>
</node>
</node>
<node TEXT="if ( $exit )" STYLE_REF="function" ID="ID_119167688" CREATED="1606780655086" MODIFIED="1606780700928">
<node TEXT="exit ()" STYLE_REF="code" ID="ID_62554206" CREATED="1606780703505" MODIFIED="1607167395659"/>
</node>
</node>
<node TEXT="private function getRempls" STYLE_REF="function" ID="ID_1192603058" CREATED="1607167165040" MODIFIED="1607167218702">
<node TEXT="if ( !isset ( $_SERVER[ HTTP_USER_AGENT ] ) )" STYLE_REF="function" ID="ID_1784437982" CREATED="1607167220601" MODIFIED="1607167264445">
<node TEXT="return" STYLE_REF="code" ID="ID_1339985563" CREATED="1607167267249" MODIFIED="1607167275564">
<node TEXT="$this-&gt;getShellRempls ()" STYLE_REF="code" ID="ID_792054355" CREATED="1607167279473" MODIFIED="1607167302022"/>
</node>
</node>
<node TEXT="return" STYLE_REF="code" ID="ID_279803406" CREATED="1607167306400" MODIFIED="1607167314595">
<node TEXT="$this-&gt;_htmlRempls" STYLE_REF="property" ID="ID_197430452" CREATED="1607167317753" MODIFIED="1607167337462"/>
</node>
</node>
<node TEXT="private function getShellRempls () : array" STYLE_REF="function" ID="ID_1824192441" CREATED="1606731771098" MODIFIED="1607166933441">
<node TEXT="return" STYLE_REF="code" ID="ID_1700685657" CREATED="1607166937744" MODIFIED="1607166944451">
<node TEXT="array" STYLE_REF="code" ID="ID_1425733599" CREATED="1607166946527" MODIFIED="1607166953171">
<node TEXT="$1.shellBrown( $2 )" STYLE_REF="code" ID="ID_1183928471" CREATED="1607166955905" MODIFIED="1607167034337"/>
<node TEXT="shellLightRed( $1 ).$2" STYLE_REF="code" ID="ID_500387875" CREATED="1607166994855" MODIFIED="1607167028993"/>
<node TEXT="shellRed( $1 ).$2&#xa;.shellLightGreen( $3 ).$4&#xa;.shellRed( $5 ).$6" STYLE_REF="code" ID="ID_1921488555" CREATED="1607167047143" MODIFIED="1607167694888"/>
<node TEXT="{" STYLE_REF="code" ID="ID_1228002889" CREATED="1607167116712" MODIFIED="1607167140853"/>
<node TEXT="}" STYLE_REF="code" ID="ID_1961984726" CREATED="1607167142119" MODIFIED="1607167145562"/>
</node>
</node>
</node>
<node TEXT="private function getDump ( $var ) : string" STYLE_REF="function" ID="ID_786430663" CREATED="1606731784834" MODIFIED="1607166850673">
<node TEXT="ob_starts ()" STYLE_REF="code" ID="ID_1448832465" CREATED="1606779852962" MODIFIED="1607166902552"/>
<node TEXT=" var_dump ( $var )" STYLE_REF="code" ID="ID_1413146547" CREATED="1606779877332" MODIFIED="1607166901016"/>
<node TEXT="return ob_get_clean ()" STYLE_REF="code" ID="ID_1516461099" CREATED="1606779923442" MODIFIED="1607166899409"/>
</node>
</node>
</node>
<node TEXT="ShellColors.php" STYLE_REF="php file" FOLDED="true" ID="ID_1328095703" CREATED="1606726700516" MODIFIED="1607076541770">
<node TEXT="namespace MainLib" STYLE_REF="code" ID="ID_1807895025" CREATED="1607167766521" MODIFIED="1607167791158"/>
<node TEXT="class ShellColors&#xa;implements \MainPorts\ImplementsFuncs,&#xa;\MainPorts\ImplementSingleTon" STYLE_REF="function" ID="ID_1623652486" CREATED="1607167807465" MODIFIED="1607929248440">
<node TEXT="use \MainTraits\MainFuncs" STYLE_REF="code" ID="ID_613128394" CREATED="1607167883537" MODIFIED="1607167893494"/>
<node TEXT="protected static $instance" STYLE_REF="property" ID="ID_731554416" CREATED="1607167898769" MODIFIED="1607167907090"/>
<node TEXT="private static $esc" STYLE_REF="property" ID="ID_806078184" CREATED="1607167920624" MODIFIED="1607167925238">
<node TEXT="&quot;\e[&quot;" STYLE_REF="code" ID="ID_296919392" CREATED="1607167927089" MODIFIED="1607167935165"/>
</node>
<node TEXT="private static $end" STYLE_REF="property" ID="ID_1731256966" CREATED="1607167937809" MODIFIED="1607167946685">
<node TEXT="&quot;\e[0m&quot;" STYLE_REF="code" ID="ID_1113420302" CREATED="1607167948434" MODIFIED="1607167955943"/>
</node>
<node TEXT="private static $lightGreenColor" STYLE_REF="property" ID="ID_879933247" CREATED="1607167964681" MODIFIED="1607167967334">
<node TEXT="1;32m" STYLE_REF="code" ID="ID_781652841" CREATED="1607167969561" MODIFIED="1607167980908"/>
</node>
<node TEXT="private static $brownColor" STYLE_REF="property" ID="ID_935825881" CREATED="1607167990636" MODIFIED="1607167993479">
<node TEXT="0;33m" STYLE_REF="code" ID="ID_1380040158" CREATED="1607167999329" MODIFIED="1607168006458"/>
</node>
<node TEXT="private static $lightRedColor" STYLE_REF="property" ID="ID_1751642149" CREATED="1607168014953" MODIFIED="1607168017663">
<node TEXT="1;31m" STYLE_REF="code" ID="ID_472384345" CREATED="1607168019690" MODIFIED="1607168031460"/>
</node>
<node TEXT="private static $redColor" STYLE_REF="property" ID="ID_916039571" CREATED="1607168036121" MODIFIED="1607168044542">
<node TEXT="0;31m" STYLE_REF="code" ID="ID_1183953814" CREATED="1607168046313" MODIFIED="1607168054324"/>
</node>
<node TEXT="public function shellLightGreen ( string $var ) : string" STYLE_REF="function" ID="ID_1047385763" CREATED="1607168068689" MODIFIED="1607168201378">
<node TEXT="return" STYLE_REF="code" ID="ID_313904461" CREATED="1607168082434" MODIFIED="1607168086478">
<node TEXT="getShellColor( self::$lightGreen, $var )" STYLE_REF="code" ID="ID_982743667" CREATED="1607168095833" MODIFIED="1607168338307"/>
</node>
</node>
<node TEXT="public function shellBrown ( string $var ) : string" STYLE_REF="function" ID="ID_759700514" CREATED="1607168117377" MODIFIED="1607168206466">
<node TEXT="return" STYLE_REF="code" ID="ID_1443760663" CREATED="1607168082434" MODIFIED="1607168086478">
<node TEXT="getShellColor( self::$brown, $var )" STYLE_REF="code" ID="ID_1272420255" CREATED="1607168095833" MODIFIED="1607168345995"/>
</node>
</node>
<node TEXT="public function shellLightRed ( string $var ) : string" STYLE_REF="function" ID="ID_96252423" CREATED="1607168117377" MODIFIED="1607168210930">
<node TEXT="return" STYLE_REF="code" ID="ID_1445313203" CREATED="1607168082434" MODIFIED="1607168086478">
<node TEXT="getShellColor( self::$lightRed, $var )" STYLE_REF="code" ID="ID_1685896434" CREATED="1607168095833" MODIFIED="1607168352266"/>
</node>
</node>
<node TEXT="public function shellRed ( string $var ) : string" STYLE_REF="function" ID="ID_970701788" CREATED="1607168117377" MODIFIED="1607168387571">
<node TEXT="return" STYLE_REF="code" ID="ID_1853860777" CREATED="1607168082434" MODIFIED="1607168086478">
<node TEXT="getShellColor( self::$red, $var )" STYLE_REF="code" ID="ID_383986884" CREATED="1607168095833" MODIFIED="1607168396082"/>
</node>
</node>
<node TEXT="public function getShellColor ( string $var, string $var ) : string" STYLE_REF="function" ID="ID_1221153589" CREATED="1607168117377" MODIFIED="1607168428170">
<node TEXT="return" STYLE_REF="code" ID="ID_880179538" CREATED="1607168082434" MODIFIED="1607168086478">
<node TEXT="sel::$esc.$color.$var.self::$end" STYLE_REF="code" ID="ID_1317242281" CREATED="1607168095833" MODIFIED="1607168474379"/>
</node>
</node>
</node>
</node>
</node>
<node TEXT="Traits/" STYLE_REF="directory/" ID="ID_1073696806" CREATED="1606726522588" MODIFIED="1607075378113">
<node TEXT="Instance.php" STYLE_REF="php file" FOLDED="true" ID="ID_1194597527" CREATED="1606726610619" MODIFIED="1607075447852">
<node TEXT="namespace MainTraits" STYLE_REF="code" ID="ID_261734255" CREATED="1606727328708" MODIFIED="1607242096905"/>
<node TEXT="trait FuncSingleTon" STYLE_REF="function" ID="ID_240536870" CREATED="1606727445141" MODIFIED="1607242113904">
<node TEXT="private static $class" STYLE_REF="property" ID="ID_1926652646" CREATED="1607929570654" MODIFIED="1607929588969"/>
<node TEXT="public static function getInstance ()&#xa;: \MainPorts\ImplementSingleTon" STYLE_REF="function" ID="ID_1820718423" CREATED="1606727469365" MODIFIED="1607929656518">
<node TEXT="if ( is_null ( self::$instance ) )" STYLE_REF="function" ID="ID_242425035" CREATED="1606727518477" MODIFIED="1606727547657">
<node TEXT="self::$class" STYLE_REF="property" ID="ID_1125016071" CREATED="1606727549301" MODIFIED="1608365043751">
<node TEXT="get_called_class ()" STYLE_REF="code" ID="ID_1196070206" CREATED="1607929331639" MODIFIED="1607929345420"/>
</node>
<node TEXT="self::$instance" STYLE_REF="property" ID="ID_1889213761" CREATED="1606727572885" MODIFIED="1607929500954">
<node TEXT="call_user_func_array" STYLE_REF="function" ID="ID_379953287" CREATED="1607929446063" MODIFIED="1608365004584">
<node TEXT="array" STYLE_REF="code" ID="ID_1645867438" CREATED="1608365009614" MODIFIED="1608365026130">
<node TEXT="self::$class" STYLE_REF="property" ID="ID_77977970" CREATED="1608365028830" MODIFIED="1608365060507"/>
<node TEXT="setInstance" STYLE_REF="code" ID="ID_1158163522" CREATED="1608365065405" MODIFIED="1608365075927"/>
</node>
<node TEXT="func_get_args ()" STYLE_REF="code" ID="ID_1185588301" CREATED="1608365077804" MODIFIED="1608365109199"/>
</node>
</node>
</node>
<node TEXT="return" STYLE_REF="code" ID="ID_479772940" CREATED="1606727602364" MODIFIED="1607929528256">
<node TEXT="self::$instance" STYLE_REF="property" ID="ID_1178736531" CREATED="1607929510639" MODIFIED="1607929523618"/>
</node>
</node>
<node TEXT="public static function setInstance ()&#xa;: \MainPorts\ImplementSingleTon" STYLE_REF="function" ID="ID_1180759820" CREATED="1607929542654" MODIFIED="1607929666223">
<node TEXT="return" STYLE_REF="code" ID="ID_773075626" CREATED="1607929983688" MODIFIED="1607929989178">
<node TEXT="new self::$class" STYLE_REF="code" ID="ID_1549276109" CREATED="1607930004264" MODIFIED="1607930018817"/>
</node>
</node>
</node>
</node>
<node TEXT="MainFuncs.php" STYLE_REF="php file" FOLDED="true" ID="ID_525449427" CREATED="1606726568132" MODIFIED="1607076531919">
<node TEXT="namespace MainTraits" STYLE_REF="code" ID="ID_1759390365" CREATED="1606727640781" MODIFIED="1607242085784"/>
<node TEXT="trait MainFuncs" STYLE_REF="function" ID="ID_587620389" CREATED="1607075986644" MODIFIED="1607076007929">
<node TEXT="use Instance" STYLE_REF="code" ID="ID_1375302461" CREATED="1607076014996" MODIFIED="1607930055577" LINK="#ID_1194597527"/>
<node TEXT="public function setMethodsAlias(array $methods)" STYLE_REF="function" ID="ID_825217346" CREATED="1607075874595" MODIFIED="1607075885913">
<node TEXT="$class = get_called_class ()" STYLE_REF="code" ID="ID_264445518" CREATED="1606727881637" MODIFIED="1606727906896"/>
<node TEXT="foreach ( $methods as $func )" STYLE_REF="function" ID="ID_829351067" CREATED="1606727907869" MODIFIED="1606777988525">
<node TEXT="eval" STYLE_REF="function" ID="ID_632658987" CREATED="1606728224326" MODIFIED="1606728301043">
<node TEXT="function $func ()" STYLE_REF="function" ID="ID_1297545395" CREATED="1606728304782" MODIFIED="1606728332764">
<node TEXT="return" STYLE_REF="code" ID="ID_484556161" CREATED="1606728379509" MODIFIED="1606728449800">
<node TEXT="call_user_func_array" STYLE_REF="function" ID="ID_742945714" CREATED="1606728423846" MODIFIED="1606728442578">
<node TEXT="array" STYLE_REF="function" ID="ID_196591906" CREATED="1606728453646" MODIFIED="1606728460915">
<node TEXT="$class::getFuncInst()" STYLE_REF="code" ID="ID_815717496" CREATED="1606728463687" MODIFIED="1607075942997"/>
<node TEXT="$func" STYLE_REF="code" ID="ID_1697371198" CREATED="1606728494781" MODIFIED="1606728517228"/>
</node>
<node TEXT="func_get_args ()" STYLE_REF="code" ID="ID_1991549164" CREATED="1606728520654" MODIFIED="1606778086418"/>
</node>
</node>
</node>
</node>
</node>
</node>
</node>
</node>
</node>
<node TEXT="init.php" ALIAS="init" STYLE_REF="php file" FOLDED="true" ID="ID_503214747" CREATED="1606725053266" MODIFIED="1607076529318">
<node TEXT="include_once(autoLoad.php)" STYLE_REF="code" ID="ID_366872227" CREATED="1606725097577" MODIFIED="1607076852982" LINK="#ID_686778826"/>
<node TEXT="$classes = json_decode ( file_get_contents(ROOTDIRS/confs/classFuncs.json ) )" STYLE_REF="code" ID="ID_567930570" CREATED="1606725136089" MODIFIED="1607240889654" LINK="#ID_88835333"/>
<node TEXT="foreach ( $classes as $class)" STYLE_REF="function" ID="ID_765967781" CREATED="1606725238930" MODIFIED="1606777854510">
<node TEXT="$class-&gt;{ namespace }::getInstance()-&gt;setMethodAlias( $class-&gt;{ methods } )" STYLE_REF="code" ID="ID_1102950385" CREATED="1606725301043" MODIFIED="1606777922353"/>
</node>
</node>
<node TEXT="autoLoad.php" STYLE_REF="php file" FOLDED="true" ID="ID_686778826" CREATED="1606725398906" MODIFIED="1607075180311">
<node TEXT="include_once ( ClassAutoLoad )" STYLE_REF="code" ID="ID_1797523044" CREATED="1607076872981" MODIFIED="1607077063949" LINK="#ID_1564025289"/>
<node TEXT="function autoLoad ( string $className )" STYLE_REF="function" ID="ID_260558810" CREATED="1606725442762" MODIFIED="1606725499054">
<node TEXT="$class = new ClassAutoLoad ( $className )" STYLE_REF="code" ID="ID_1128727570" CREATED="1606725504178" MODIFIED="1607076953719"/>
<node TEXT="require ( $class-&gt;getClassFile )" STYLE_REF="code" ID="ID_359044104" CREATED="1606725562435" MODIFIED="1607076980422"/>
</node>
<node TEXT="spl_autoload_register ( autoLoad )" STYLE_REF="code" ID="ID_1930822740" CREATED="1606725710930" MODIFIED="1606725741208"/>
</node>
<node TEXT="ClassAutoLoad.php" STYLE_REF="php file" FOLDED="true" ID="ID_1564025289" CREATED="1607077041589" MODIFIED="1607077053122">
<node TEXT="class ClassAutoLoad" STYLE_REF="function" ID="ID_1093854412" CREATED="1607077132102" MODIFIED="1607077147002">
<node TEXT="private $_className" STYLE_REF="property" ID="ID_496685717" CREATED="1607077158437" MODIFIED="1607078451770"/>
<node TEXT="private $_paths" STYLE_REF="property" ID="ID_1236468748" CREATED="1607077175253" MODIFIED="1607078453385"/>
<node TEXT="private $_match" STYLE_REF="property" ID="ID_340247242" CREATED="1607077185949" MODIFIED="1607078454978"/>
<node TEXT="private $_class" STYLE_REF="property" ID="ID_700184930" CREATED="1607077208389" MODIFIED="1607078456585"/>
<node TEXT="public function __construct ( string $className )" STYLE_REF="function" ID="ID_936616174" CREATED="1607077225373" MODIFIED="1607077252820">
<node TEXT="$this-&gt;formatClassPath ( $className )" STYLE_REF="code" ID="ID_1832364313" CREATED="1607077257814" MODIFIED="1607077324791" LINK="#ID_1905203197"/>
<node TEXT="$this-&gt;setAutoLoadJson ()" STYLE_REF="code" ID="ID_1288405725" CREATED="1607077352269" MODIFIED="1607077422928" LINK="#ID_23659310"/>
<node TEXT="$this-&gt;setDirClass ()" STYLE_REF="code" ID="ID_850882000" CREATED="1607077446581" MODIFIED="1607078608401" LINK="#ID_1171500035"/>
<node TEXT="$this-&gt;setClassPAth" STYLE_REF="code" ID="ID_1599812340" CREATED="1607078628479" MODIFIED="1607162328151" LINK="#ID_1141638677"/>
</node>
<node TEXT="private function formatClassPath ( string $className )" STYLE_REF="function" ID="ID_1905203197" CREATED="1606725679586" MODIFIED="1607077346231">
<node TEXT="$this-&gt;_className" STYLE_REF="property" ID="ID_1073348358" CREATED="1607078531672" MODIFIED="1607078566885">
<node TEXT="str_replace ( \\, /, $className )" STYLE_REF="code" ID="ID_178514330" CREATED="1606726065267" MODIFIED="1607078578824"/>
</node>
</node>
<node TEXT="private function setAutoloadJson ()" STYLE_REF="function" ID="ID_23659310" CREATED="1607071797654" MODIFIED="1607077537399">
<node TEXT="$this-&gt;_paths" STYLE_REF="property" ID="ID_399181891" CREATED="1607071822190" MODIFIED="1607078510202">
<node TEXT="json_decode ( file_get_contents ( ROOTDIRS/confs/classDirs.json  ) )" STYLE_REF="code" ID="ID_297700740" CREATED="1607078475136" MODIFIED="1607240939118" LINK="#ID_785969020"/>
</node>
</node>
<node TEXT="private function setDirClass ()" STYLE_REF="function" ID="ID_1171500035" CREATED="1606725644651" MODIFIED="1607077573521">
<node TEXT="preg_match" STYLE_REF="function" ID="ID_1584973452" CREATED="1606726023355" MODIFIED="1607077594816">
<node TEXT="# ( implode ( |, $this-&gt;_paths-&gt;{ paths } ) \/ #" STYLE_REF="code" ID="ID_1165293283" CREATED="1607077600030" MODIFIED="1607078362026"/>
<node TEXT="$this-&gt;_className" STYLE_REF="property" ID="ID_1482040887" CREATED="1607078367167" MODIFIED="1607078463049"/>
<node TEXT="$this-&gt;_match" STYLE_REF="property" ID="ID_1329296829" CREATED="1607078433806" MODIFIED="1607078461642"/>
</node>
</node>
<node TEXT="private function setClassPath ()" STYLE_REF="function" ID="ID_1141638677" CREATED="1607161655511" MODIFIED="1607161722575">
<node TEXT="if ( !empty ( $this-&gt;_match ) )" STYLE_REF="function" ID="ID_468230992" CREATED="1607161723985" MODIFIED="1607161829836">
<node TEXT="$this-&gt;aliasToPath ()" STYLE_REF="code" ID="ID_1633594913" CREATED="1607161841921" MODIFIED="1607162339523" LINK="#ID_1860118551"/>
</node>
<node TEXT="else" STYLE_REF="function" ID="ID_210840814" CREATED="1607161833953" MODIFIED="1607161839205">
<node TEXT="$this-&gt;_class" STYLE_REF="property" ID="ID_1677157510" CREATED="1607161876577" MODIFIED="1607161886744">
<node TEXT="$this-&gt;_className" STYLE_REF="property" ID="ID_1944798379" CREATED="1607161888417" MODIFIED="1607161910636"/>
</node>
</node>
</node>
<node TEXT="private function aliasToPath ()" STYLE_REF="function" ID="ID_1860118551" CREATED="1607162032721" MODIFIED="1607162054835">
<node TEXT="$this-&gt;_class" STYLE_REF="property" ID="ID_38833451" CREATED="1607162057562" MODIFIED="1607162068132">
<node TEXT="ROOTDIRS/" STYLE_REF="code" ID="ID_738139603" CREATED="1607162068905" MODIFIED="1607162130293"/>
<node TEXT="str_replace" STYLE_REF="function" ID="ID_643169736" CREATED="1607162170337" MODIFIED="1607162186672">
<node TEXT="$this-&gt;_match[0]" STYLE_REF="property" ID="ID_1765954039" CREATED="1607162188073" MODIFIED="1607162222282"/>
<node TEXT="$this-&gt;_paths-&gt;{ $this-&gt;_match[1] }" STYLE_REF="property" ID="ID_10347341" CREATED="1607162224417" MODIFIED="1607162282084"/>
<node TEXT="$this-&gt;_className" STYLE_REF="property" ID="ID_134076985" CREATED="1607162263761" MODIFIED="1607162280598"/>
</node>
<node TEXT=".php" STYLE_REF="code" ID="ID_1711747204" CREATED="1607162301418" MODIFIED="1607162308108"/>
</node>
</node>
<node TEXT="public function getClassFile ()" STYLE_REF="function" ID="ID_927524356" CREATED="1607162368649" MODIFIED="1607162390639">
<node TEXT="return" STYLE_REF="code" ID="ID_325005441" CREATED="1607162393778" MODIFIED="1607162397749">
<node TEXT="$this-&gt;_class" STYLE_REF="property" ID="ID_903811007" CREATED="1607162398658" MODIFIED="1607162409151"/>
</node>
</node>
</node>
</node>
</node>
<node TEXT="public/" STYLE_REF="directory/" POSITION="left" ID="ID_823377925" CREATED="1606726831044" MODIFIED="1607930159882">
<edge COLOR="#7c007c"/>
<node TEXT="index.php" STYLE_REF="php file" FOLDED="true" ID="ID_1395513590" CREATED="1607168601394" MODIFIED="1607168611707">
<node TEXT="define ( ROOTDIRS, ../ )" STYLE_REF="code" ID="ID_1125170402" CREATED="1607168627234" MODIFIED="1607168649308"/>
<node TEXT="include_once ( ROOTDIRS/core/init.php )" STYLE_REF="code" ID="ID_823454034" CREATED="1607168650482" MODIFIED="1607240841791" LINK="#ID_503214747"/>
</node>
</node>
<node TEXT="confs/" STYLE_REF="directory/" POSITION="left" ID="ID_1178901989" CREATED="1606725356018" MODIFIED="1607930163459">
<edge COLOR="#007c7c"/>
<node TEXT="classDirs.json" STYLE_REF="ini file" FOLDED="true" ID="ID_785969020" CREATED="1606726141428" MODIFIED="1606726160313">
<node TEXT="paths" STYLE_REF="function" ID="ID_902106563" CREATED="1606990113399" MODIFIED="1606990165401">
<node TEXT="MainPorts" STYLE_REF="code" ID="ID_547392759" CREATED="1606990207536" MODIFIED="1607240675818" LINK="#ID_1988882949"/>
<node TEXT="MainTraits" STYLE_REF="code" ID="ID_1570373718" CREATED="1606990215782" MODIFIED="1607240686751" LINK="#ID_507292984"/>
<node TEXT="MainLib" STYLE_REF="code" ID="ID_1687616272" CREATED="1606990225023" MODIFIED="1607240700607" LINK="#ID_1068731871"/>
<node TEXT="User" STYLE_REF="code" ID="ID_1558796204" CREATED="1607240539389" MODIFIED="1607240706271" LINK="#ID_608402927"/>
<node TEXT="App" STYLE_REF="code" ID="ID_1261366955" CREATED="1606990231590" MODIFIED="1607240715125" LINK="#ID_108116871"/>
</node>
<node TEXT="MainPorts" STYLE_REF="function" ID="ID_1988882949" CREATED="1606990240007" MODIFIED="1607240581655">
<node TEXT="core/Ports/" STYLE_REF="code" ID="ID_1501592438" CREATED="1606990251679" MODIFIED="1607240572071"/>
</node>
<node TEXT="MainTraits" STYLE_REF="function" ID="ID_507292984" CREATED="1607240606845" MODIFIED="1607240616688">
<node TEXT="core/Traits/" STYLE_REF="code" ID="ID_906066506" CREATED="1607240618790" MODIFIED="1607240638812"/>
</node>
<node TEXT="MainLib" STYLE_REF="function" ID="ID_1068731871" CREATED="1606990215782" MODIFIED="1606990322323">
<node TEXT="core/libs/" STYLE_REF="code" ID="ID_618387746" CREATED="1606726289587" MODIFIED="1607240650831"/>
</node>
<node TEXT="User" STYLE_REF="function" ID="ID_608402927" CREATED="1606990225023" MODIFIED="1606990322326">
<node TEXT="devs/" STYLE_REF="code" ID="ID_1714204371" CREATED="1606726272907" MODIFIED="1606779715434"/>
</node>
<node TEXT="App" STYLE_REF="function" ID="ID_108116871" CREATED="1606990231590" MODIFIED="1606990322327">
<node TEXT="devs/App" STYLE_REF="code" ID="ID_1992508943" CREATED="1606726302042" MODIFIED="1606990380153"/>
</node>
</node>
<node TEXT="classFuncs.json" STYLE_REF="ini file" FOLDED="true" ID="ID_88835333" CREATED="1606726317035" MODIFIED="1606726335929">
<node TEXT="parseConfs" STYLE_REF="function" ID="ID_918005123" CREATED="1606778148292" MODIFIED="1606990441816">
<node TEXT="namespace" STYLE_REF="function" ID="ID_450114298" CREATED="1606778231571" MODIFIED="1606778477342">
<node TEXT="\MainLib\\ParseConfs" STYLE_REF="code" ID="ID_1281298806" CREATED="1606778443319" MODIFIED="1607240768687"/>
</node>
<node TEXT="methods" STYLE_REF="function" ID="ID_1445117943" CREATED="1606778296572" MODIFIED="1606778581929">
<node TEXT="parseJson" STYLE_REF="code" ID="ID_925453276" CREATED="1606778327533" MODIFIED="1606778340359"/>
<node TEXT="getJsConf" STYLE_REF="code" ID="ID_683338300" CREATED="1606778341093" MODIFIED="1606778350997"/>
</node>
</node>
<node TEXT="dumps :" STYLE_REF="function" ID="ID_1679718093" CREATED="1606778355371" MODIFIED="1606778547107">
<node TEXT="namespace" STYLE_REF="function" ID="ID_1287928419" CREATED="1606778402094" MODIFIED="1606778430041">
<node TEXT="\\MainLib\\Dumps" STYLE_REF="code" ID="ID_1728740064" CREATED="1606778504836" MODIFIED="1607240781679"/>
</node>
<node TEXT="methods" STYLE_REF="function" ID="ID_1791586055" CREATED="1606778569369" MODIFIED="1606778577133">
<node TEXT="dump" STYLE_REF="code" ID="ID_208330257" CREATED="1606778585741" MODIFIED="1606778697292"/>
</node>
</node>
<node TEXT="shellColors" STYLE_REF="function" ID="ID_789258713" CREATED="1606778594832" MODIFIED="1606778604283">
<node TEXT="namespace" STYLE_REF="function" ID="ID_482120086" CREATED="1606778606376" MODIFIED="1606778611844">
<node TEXT="\\MainLib\\ShellColors" STYLE_REF="code" ID="ID_535207036" CREATED="1606778616140" MODIFIED="1607240806072"/>
</node>
<node TEXT="methods" STYLE_REF="function" ID="ID_1503492559" CREATED="1606778645133" MODIFIED="1606778651366">
<node TEXT="shellLightGreen" STYLE_REF="code" ID="ID_579616654" CREATED="1606778652991" MODIFIED="1606778691309"/>
<node TEXT="shellBrown" STYLE_REF="code" ID="ID_1294997893" CREATED="1606778672861" MODIFIED="1606778689576"/>
<node TEXT="shellLightRed" STYLE_REF="code" ID="ID_361070989" CREATED="1606778701635" MODIFIED="1606778711680"/>
<node TEXT="shellRed" STYLE_REF="code" ID="ID_1251631202" CREATED="1606778712320" MODIFIED="1606778718147"/>
<node TEXT="getShellColor" STYLE_REF="code" ID="ID_319945460" CREATED="1606778719678" MODIFIED="1606778735377"/>
</node>
</node>
</node>
</node>
</node>
</map>
