<?php

namespace App\DataTables;

use App\BankData;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BanksDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'business-setup.bank-data.datatable_columns.action')
            ->rawColumns([
                'action',
            ]);
    }


    public function query(BankData $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */

    public function html()
    {
        return $this->builder()
            ->setTableId('banksdatatables-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->parameters([
                'dom '=> '<"row"<"float-left"B><"float-right"f>><"row"<"float-left"i><"float-right"p>>rtlp',
                'lengthMenu' => [
                    [ 10, 25, 50,100, -1 ],
                    [ trans('datatable.10rows'), trans('datatable.25rows'),
                        trans('datatable.50rows'),trans('datatable.100rows'), trans('datatable.show_all'), ]
                ],
                "bPaginate" => true,
                "lengthChange" => true,
                "iDisplayLength" => 25,

                'order'   => [[0, 'asc']],
                'buttons' => [
                    ['extend'=>'reload','className'=>'btn btn-lg btn-success' ,'text'=>'<i class="fa fa-refresh"> '.trans('datatable.reload').'</i>'],
                    ['extend'=>'export','className'=>'btn btn-lg btn-success' ,'text'=> '<i class="fa fa-file-pdf-o"> '.trans('datatable.export').'</i>'],['extend'=>'colvis','className'=>'btn btn-success' ,'text'=>trans('datatable.colvis')],
                ],
                'language'=>[
                    "sProcessing"=> trans('datatable.sProcessing'),
                    "sLengthMenu"=> "_MENU_",
                    "sZeroRecords"=> trans('datatable.sZeroRecords'),
                    "sEmptyTable"=> trans('datatable.sEmptyTable'),
                    "sInfo"=> trans('datatable.sInfo'),
                    "sInfoEmpty"=> trans('datatable.sInfoEmpty'),
                    "sInfoFiltered"=>trans('datatable.sInfoFiltered'),
                    "sInfoPostFix"=> "",
                    "sSearch"=>'',
                    "sUrl"=> "",
                    "sInfoThousands"=> ",",
                    "sLoadingRecords"=> trans('datatable.sLoadingRecords'),
                    "paginate"=>[
                        "first" => trans('datatable.first'),
                        "last"  => trans('datatable.last'),
                        "next"  => trans('datatable.next'),
                        "previous"  => trans('datatable.previous'),
                    ]
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [ 'name'=>'code',
                'data'=>'code',
                'title'=>trans('employee.code'),
            ],
            [ 'name'=>'name',
                'data'=>'name',
                'title'=>trans('employee.name'),
            ],
            [ 'name'=>'phone',
                'data'=>'phone',
                'title'=>trans('employee.phone'),

            ],
            [ 'name'=>'address',
                'data'=>'address',
                'title'=>trans('employee.address'),
            ],
            [ 'name'=>'action',
                'data'=>'action',
                'title'=>trans('general.action'),
                "orderable" => false,
                "exportable" => false,
                "printable" => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Banks_' . date('YmdHis');
    }
}
