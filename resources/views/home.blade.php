@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h2><a href="/presentations/create">Post a Presentation</a></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ !Auth::user()->isAdmin() ? 'Your posts' : 'Listed Presentations' }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Presenter</th>
                                            <th>Post Date</th>
                                            <th># of comments</th>
                                            <th>Approved</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($presentations as $presentation)
                                        <tr class="odd gradeX">
                                            <td><a href="/presentations/{{ $presentation->id }}">{{ $presentation->title }}</a></td>
                                            <td><a href="/presenters/{{ $presentation->presenter->id }}">{{ $presentation->presenter->name }}</a></td>
                                            <td>{{ Carbon\Carbon::parse($presentation->created_at)->diffForHumans() }}</td>
                                            <td class="center">{{ $presentation->comments()->count() }}</td>
                                            <td class="center">{{ $presentation->approved == 0 ? 'No' : 'Yes' }}</td>
                                        </tr>
                                    @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </div>
@endsection
