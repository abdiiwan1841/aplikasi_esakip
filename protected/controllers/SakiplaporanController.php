<?php

class SakiplaporanController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $data["kriteria"]=true;

        $this->layout = null;
        if ( isset($_GET['t']) && isset($_GET['o']) && isset($_GET['b']) && isset($_GET['l']) && count($_GET) > 1 ) {
            $data["idLap"]=$_GET["l"];
            $data["thn"]=$_GET["t"];
            $data["opd"]=$_GET["o"];
            $data["ispdf"]=$_GET["b"];

            if ($data["ispdf"]==1)
            {
                $mPDF1 = Yii::app()->ePdf->mpdf('', 'A2',
                    11, // Sets the default document font size in points (pt)
                    '', // Sets the default font-family for the new document.
                    15, // margin_left. Sets the page margins for the new document.
                    15, // margin_right
                    16, // margin_top
                    16, // margin_bottom
                    9, // margin_header
                    9, // margin_footer
                    'L');
                $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot') . '/static/css/pdf.css');
                $mPDF1->WriteHTML($stylesheet, 1);

                # renderPartial (only 'view' of current controller)
                $mPDF1->WriteHTML($this->renderPartial('laporan', $data, true));

                # Outputs ready PDF
                $mPDF1->Output();
            } else {
                $this->renderPartial('laporan', $data);
            }
        } else
        {
            echo "<script>window.close()</script>";
        }

    }

}