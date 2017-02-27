<?php

namespace App\DataTables;

use App\Komisioner;
use Yajra\Datatables\Services\DataTable;

class KomisionerDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $komisioner = $this->query();
        return $this->datatables
        ->eloquent($komisioner)
        ->addColumn('action', function($komisioner){
            return '
            <a href="'. url('komisioner/hapus/' . $komisioner->id) . '" class="btn btn-danger" data-toggle="tooltip" title="Hapus komisioner">
                <i class="fa fa-trash-o"></i>
            </a>
            <a href="'. url('komisioner/edit/' . $komisioner->id) 
            .'" class="btn btn-warning" data-toggle="tooltip" title="Edit komisioner"><i class="fa fa-pencil"></i>
            </a>';
        })
        ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Komisioner::query();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->columns($this->getColumns())
        ->ajax('')
        ->addAction(['width' => '80px'])
        ->parameters([
            'dom' => 'Bfrtip',
            'buttons' => ['csv', 'excel', 'pdf', 'print', 'reset', 'reload'],
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
        'id',
            // add your columns
        'komisioner_name',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'komisionerdatatables_' . time();
    }
}
