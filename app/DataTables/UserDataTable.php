<?php

namespace App\DataTables;

use App\User;
use Yajra\Datatables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        $user = $this->query();
        return $this->datatables
        ->eloquent($user)
        ->addColumn('action', function($user){
            return '
            <a href="'. url('user/hapus/' . $user->id) . '" class="btn btn-danger" data-toggle="tooltip" title="Hapus User">
                <i class="fa fa-trash-o"></i>
            </a>
            <a href="'. url('user/edit/' . $user->id) 
                .'" class="btn btn-warning" data-toggle="tooltip" title="Edit User"><i class="fa fa-pencil"></i>
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
        $query = User::query();

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
        'username',
        'otoritas',
        'deputi_kom',
        'departemen',
        'kojk',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'userdatatables_' . time();
    }
}
