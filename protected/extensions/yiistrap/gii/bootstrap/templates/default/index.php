<?php
/**
 * The following variables are available in this template:
 * - $this: the BootstrapCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

$this->menu=array(
    array('label'=>'Tambah <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

?>

<h1>Data <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<?php echo "<?php"; ?> $this->widget('\TbGridView',array(
    'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'htmlOptions'=> array('class'=>'table-responsive'),
    'emptyText'=>'Belum ada datanya..'
    'columns'=>array(
<?php
$count = 0;
foreach ($this->tableSchema->columns as $column) {
    if (++$count == 7) {
        echo "\t\t/*\n";
    }
    echo "\t\t'" . $column->name . "',\n";
}
if ($count >= 7) {
    echo "\t\t*/\n";
}
?>