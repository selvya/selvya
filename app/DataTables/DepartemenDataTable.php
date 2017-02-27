<?php

namespace App\DataTables;

use App\Departemen;
use Yajra\Datatables\Services\DataTable;

class DepartemenDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $departemen = $this->query();
        return $this->datatables
        ->eloquent($departemen)
        ->addColumn('action', function($departemen){
            return '
            <a href="'. url('departemen/hapus/' . $departemen->id) . '" class="btn btn-danger" data-toggle="tooltip" title="Hapus Departemen">
                <i class="fa fa-trash-o"></i>
            </a>
            <a href="'. url('departemen/edit/' . $departemen->id) 
                .'" class="btn btn-warning" data-toggle="tooltip" title="Edit Departemen"><i class="fa fa-pencil"></i>
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
        $query = Departemen::query();

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
        ->addAction(['width' => '60px'])
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
        'departemen_name',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'departemendatatables_' . time();
    }
}
