<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use Illuminate\Http\Request;

use illuminate\Support\Facades\Auth;
use App\Transaction;

use Yajra\DataTables\Facades\DataTables;

class DashboardTransactionController extends Controller
{
    public function index()
    {         
        
        if(request()->ajax())
        {
            $query = Transaction::where('users_id', Auth::user()->id)->orderBy('id', 'DESC');
            return Datatables::of($query)
                ->addcolumn('action', function($item) {
                    if (is_null($item->checkout)){
                        return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <form action="'. route('dashboard-transactions.update', $item->id) .'" method="POST">
                                    ' . method_field('PUT') . csrf_field() .'    
                                    <button type="submit" class="btn btn-success mr-1 mb-1">
                                        Check Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    ';
                    } else {
                        return '<button type="submit" class="btn btn-dark mr-1 mb-1">
                                        Already Checkout
                                    </button>';
                    }
                    
                })

                ->rawColumns(['action'])
                ->make();
        }
        
        return view('pages.user.transaction.index');
    }

    public function create()
    {
        return view('pages.user.transaction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'room' => $request->room,
            'checkin' => now(),
            'checkout' => NULL,
        ]);


        return redirect()->route('dashboard-transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data['checkout'] = now();

        $item = Transaction::findOrFail($id);
        
        $item->update($data);

        return redirect()->route('dashboard-transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
