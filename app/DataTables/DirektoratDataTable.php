<?php

namespace App\DataTables;

use App\Direktorat;
use Yajra\Datatables\Services\DataTable;

class DirektoratDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $direktorat = $this->query();
        return $this->datatables
        ->eloquent($direktorat)
        ->addColumn('action', function($direktorat){
            return '
            <a href="'. url('direktorat/hapus/' . $direktorat->id) . '" class="btn btn-danger" data-toggle="tooltip" title="Hapus direktorat">
                <i class="fa fa-trash-o"></i>
            </a>
            <a href="'. url('direktorat/edit/' . $direktorat->id) 
            .'" class="btn btn-warning" data-toggle="tooltip" title="Edit direktorat"><i class="fa fa-pencil"></i>
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
        $query = Direktorat::query();

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
        'direktorat_name',
        'created_at',
        'updated_at',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'direktoratdatatables_' . time();
    }
}
