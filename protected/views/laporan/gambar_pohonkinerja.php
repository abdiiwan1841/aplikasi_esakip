

<?php
Yii::app()->clientScript->registerScriptFile(
Yii::app()->baseUrl.'/static/gojs/release/go.js',
CClientScript::POS_HEAD);

    $id_instansi =Yii::app()->user->getOpd();
        $visi=Visi::model()->find('id_instansi=:id_instansi', array('id_instansi' => $id_instansi));
      $instansi=Opd::model()->find('id_instansi=:id_instansi', array('id_instansi' => $id_instansi));
        
        $misi = Misi::model()->findAll(array("condition"=>"idinstansi='".$id_instansi."'"));
      

$data[] = array("key"=>0,"name"=>"INDEKS KETERBUKAAN INFORMASI PUBLIK");
$data[] = array("key"=>0001,"boss"=>0,"name"=>"VISI RENSTRA OPD");
$data[] = array("key"=>$visi["id_instansi"],"boss"=>0001,"name"=>$visi["visi"]);

    $no=1;
     foreach($misi as $misi_row){
            
            

            $data[] = array("key"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"],"boss"=>$visi["id_instansi"],"name"=>"Misi ".$no.":\n".$misi_row->misi);
$no++;
    }

     $no=1;
         foreach($misi as $misi_row){

              $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

            $data[] = array("key"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan,"boss"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"],"name"=>"Tujuan ".$no.": \n".$tujuan->tujuan);

            $no++;
        }


$no=1;
         foreach($misi as $misi_row){

              $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

               $sasaran = Sasaran::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."'"));

          
              $data[] = array("key"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan.$sasaran->nomor_sasaran,"boss"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan,"name"=>"Sasaran ".$no.": \n".$sasaran->sasaran);


            $no++;
        }


$no=1;
         foreach($misi as $misi_row){

            $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

            $sasaran = Sasaran::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."'"));

            $indikator = Indikator::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_sasaran='".$sasaran->nomor_sasaran."'"));

            $data[] = array("key"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan.$sasaran->nomor_sasaran.$indikator->nomor_indikator,"boss"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan.$sasaran->nomor_sasaran,"name"=>"Indikator ".$no.": \n".$indikator->indikator." (TARGET ".(int) $indikator->target." ".$indikator->satuan.")");

            $no++;
        }


       $no=1;
       foreach($misi as $misi_row){

            $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

            $sasaran = Sasaran::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."'"));

            $indikator = Indikator::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_sasaran='".$sasaran->nomor_sasaran."'"));

            $program = Program::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_indikator='".$indikator->nomor_indikator."' and nomor_sasaran='".$sasaran->nomor_sasaran."'"));

            $data[] = array("key"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan.$sasaran->nomor_sasaran.$indikator->nomor_indikator.$program->nomor_program,"boss"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan.$sasaran->nomor_sasaran.$indikator->nomor_indikator,"name"=>"Program ".$no.": \n".$program->program);

          $no++;
      }

      $no=1;
      foreach($misi as $misi_row){

           $tujuan = Tujuan::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."'"));

           $sasaran = Sasaran::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."'"));

           $indikator = Indikator::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_sasaran='".$sasaran->nomor_sasaran."'"));

           $program = Program::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_indikator='".$indikator->nomor_indikator."' and nomor_sasaran='".$sasaran->nomor_sasaran."'"));

           $programeselontiga = ProgramEselonTiga::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and nomor_misi='".$misi_row->nomisi."' and nomor_tujuan='".$tujuan->nomor_tujuan."' and nomor_indikator='".$indikator->nomor_indikator."' and nomor_sasaran='".$sasaran->nomor_sasaran."' and nomor_program_eselon_dua='".$program->nomor_program."'"));

           $pejabateselontiga = Pejabat::model()->find(array("condition"=>"id_instansi='".$id_instansi."' and id='".$programeselontiga->idpejabat."' "));

           $data[] = array("key"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan.$sasaran->nomor_sasaran.$indikator->nomor_indikator.$program->nomor_program.$programeselontiga->nomor_program,"boss"=>$misi_row["misid"].$misi_row["nomisi"].$misi_row["idinstansi"].$tujuan->nomor_tujuan.$sasaran->nomor_sasaran.$indikator->nomor_indikator.$programeselontiga->nomor_program,"name"=> $pejabateselontiga->nama_jabatan." \n Program Eselon 3 ".$no.": \n".$programeselontiga->program);

         $no++;
     }


$data_json = json_encode($data);


echo CHtml::script('


   

window.onload=init;
  // the Search functionality highlights all of the nodes that have at least one data property match a RegExp
  function searchDiagram() {  // called by button
    var input = document.getElementById("mySearch");
    if (!input) return;
    input.focus();

    myDiagram.startTransaction("highlight search");

    if (input.value) {
      // search four different data properties for the string, any of which may match for success
      // create a case insensitive RegExp from what the user typed
      var regex = new RegExp(input.value, "i");
      var results = myDiagram.findNodesByExample({ name: regex },
                                                 { nation: regex },
                                                 { title: regex },
                                                 { headOf: regex });
      myDiagram.highlightCollection(results);
      // try to center the diagram at the first node that was found
      if (results.count > 0) myDiagram.centerRect(results.first().actualBounds);
    } else {  // empty string only clears highlighteds collection
      myDiagram.clearHighlighteds();
    }

    myDiagram.commitTransaction("highlight search");
  }



 

   

   

function init(){
    if (window.goSamples) goSamples(); 
    var $ = go.GraphObject.make;  // for conciseness in defining templates

    myDiagram =
      $(go.Diagram, "myDiagramDiv",  // the DIV HTML element
        {
          // Put the diagram contents at the top center of the viewport
          initialDocumentSpot: go.Spot.TopCenter,
          initialViewportSpot: go.Spot.TopCenter,
          // OR: Scroll to show a particular node, once the layout has determined where that node is
          //"InitialLayoutCompleted": function(e) {
          //  var node = e.diagram.findNodeForKey(28);
          //  if (node !== null) e.diagram.commandHandler.scrollToPart(node);
          //},
          layout:
            $(go.TreeLayout,  // use a TreeLayout to position all of the nodes
              {
                treeStyle: go.TreeLayout.StyleLastParents,
                // properties for most of the tree:
                angle: 90,
                layerSpacing: 80,
                // properties for the "last parents":
                alternateAngle: 0,
                alternateAlignment: go.TreeLayout.AlignmentStart,
                alternateNodeIndent: 20,
                alternateNodeIndentPastParent: 1,
                alternateNodeSpacing: 20,
                alternateLayerSpacing: 40,
                alternateLayerSpacingParentOverlap: 1,
                alternatePortSpot: new go.Spot(0.001, 1, 20, 0),
                alternateChildPortSpot: go.Spot.Left
              })
        });

    // define Converters to be used for Bindings
    function theNationFlagConverter(nation) {
      return "https://www.nwoods.com/go/Flags/" + nation.toLowerCase().replace(/\s/g, "-") + "-flag.Png";
    }

     


    function theInfoTextConverter(info) {
      var str = "";
      if (info.title) str +=  info.title;
      if (info.headOf) str += "\n\nHead of: " + info.headOf;
      if (typeof info.boss === "number") {
        var bossinfo = myDiagram.model.findNodeDataForKey(info.boss);
        if (bossinfo !== null) {
          //str += "\n\n " + bossinfo.name;
        }
      }
      return str;
    }

    // define the Node template
    myDiagram.nodeTemplate =
      $(go.Node, "Auto",
        // the outer shape for the node, surrounding the Table
        $(go.Shape, "Rectangle",
          { stroke: null, strokeWidth: 0 },
                                                  /* reddish if highlighted, blue otherwise */
          new go.Binding("fill", "isHighlighted", function(h) { return h ? "#F44336" : "#A7E7FC"; }).ofObject()),
        // a table to contain the different parts of the node
        $(go.Panel, "Table",
          { margin: 6, maxSize: new go.Size(200, NaN) },
          // the two TextBlocks in column 0 both stretch in width
          // but align on the left side
          $(go.RowColumnDefinition,
            {
              column: 0,
              stretch: go.GraphObject.Horizontal,
              alignment: go.Spot.Left
            }),
          // the name
          $(go.TextBlock,
            {
              row: 0, column: 0,
              maxSize: new go.Size(160, NaN), margin: 2,
              font: "500 16px Roboto, sans-serif",
              alignment: go.Spot.Top
            },
            new go.Binding("text", "name")),
          // the country flag
         /* $(go.Picture,
            {
              row: 0, column: 1, margin: 2,
              imageStretch: go.GraphObject.Uniform,
              alignment: go.Spot.TopRight
            },
            // only set a desired size if a flag is also present:
            new go.Binding("desiredSize", "nation", function(){ return new go.Size(34, 26) }),
            new go.Binding("source", "nation", theNationFlagConverter)),*/
          // the additional textual information
          $(go.TextBlock,
            {
              row: 1, column: 0, columnSpan: 2,
              font: "12px Roboto, sans-serif"
            },
            new go.Binding("text", "", theInfoTextConverter))
        )  // end Table Panel
      );  // end Node

    // define the Link template, a simple orthogonal line
    myDiagram.linkTemplate =
      $(go.Link, go.Link.Orthogonal,
        { corner: 5, selectable: false },
        $(go.Shape, { strokeWidth: 3, stroke: "#424242" } ));  // dark gray, rounded corner links


    // set up the nodeDataArray, describing each person/position
    var nodeDataArray = '.$data_json.';

    // create the Model with data for the tree, and assign to the Diagram
    myDiagram.model =
      $(go.TreeModel,
        { nodeParentKeyProperty: "boss",  // this property refers to the parent node data
          nodeDataArray: nodeDataArray });

    // Overview
    myOverview =
      $(go.Overview, "myOverviewDiv",  // the HTML DIV element for the Overview
        { observed: myDiagram, contentAlignment: go.Spot.Center });   // tell it which Diagram to show and pan
  
          //image

          window.addImage = function(img) {
            obj = document.getElementById("severalImages");
            img.className = "images-grafik";
            
            obj.appendChild(img)
          }
        

        var d = myDiagram.documentBounds;
        var halfWidth = d.width / 2;
        var halfHeight = d.height / 2;
        img = myDiagram.makeImage({
                position: new go.Point(d.x, d.y),
                size: new go.Size(halfWidth,halfHeight)
              });
              
        
              addImage(img); // Adds the image to a DIV below
              
            
  
      }

      $(document).ready(function(){
      
        console.log($(".images-grafik").attr("src"));
        
      });

    ');

?>


<div class="form-group">
                <div class="col-sm-offset-0 col-sm-5">
                    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_DANGER,
                        '<p> Jika pohon kinerja yang ditampilkan tidak sesuai (tampil secara vertikal), User dapat mengunggah file pohon kinerja (bentuk pohon kinerja secara horizontal) dalam format file (.pdf / .jpg)</p>'); ?>
                </div>
            </div>

<!-- Container fluid Starts -->
<div class="container-fluid">

    <!-- Spacer starts -->
    <div class="spacer-xs">
       
<div id="myDiagramDiv" style="display:none;background-color: white; border: solid 1px #ccc; width: 100%; height: 700px"></div>
  <div id="myOverviewDiv"></div> <!-- Styled in a <style> tag at the top of the html page -->
  
  <div id="severalImages"></div>
	
    </div>


</div>
