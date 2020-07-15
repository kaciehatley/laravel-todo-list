<!-- INCOMPLETE TASK MODAL -->
<div id="incompleteInfo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="incTaskHeader"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" id="completeForm">
                    {{ csrf_field() }}
                    {{ method_field('patch')}}
                    <input name="completeTask_ID" type="hidden" id="completeTask_ID" value="">
                    <button type="submit" class="btn btn-dark mb-3" formmethod="post"><i class="fa fa-check mr-1" aria-hidden="true"></i>Mark As Complete</button>
                </form>
                <form method="post" id="updateIncForm">
                    {{ csrf_field() }}
                    {{ method_field('patch')}}
                    <input name="task_ID" type="hidden" id="task_ID" value="">
                    <div class="form-group">
                        <label for="task">Task</label>
                        <input id="updateIncTask" class="form-control" type="text" name="incompleteTask" placeholder="Take A Walk...">
                    </div>
                    <div class="form-group">
                        <label for="details">Task Details</label>
                        <textarea class="form-control" rows="5" name="incompleteDetails" id="updateIncDetails"></textarea>
                    </div>
                    <label for="priority">Priority</label>
                        <select class="form-control" id="updateIncPriority">
                            <option>Important</option>
                            <option>Urgent</option>
                            <option>Ignore</option>
                            <option>Optional</option>
                        </select>
                    <p class="mt-2" id="incCreated"></p>
                    <p id="incUpdated"></p>
                    <p id="updateTaskID" class="d-none"></p>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-save mr-1" aria-hidden="true"></i>Update Task</button>
                </form>
                <form method="post" id="deleteInc">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                    <input name="deleteIncID" type="hidden" id="deleteIncID" value="">
                    <button type="submit" class="btn btn-danger mt-3"><i class="fa fa-trash mr-1" aria-hidden="true"></i>Delete Task</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
                


<!-- COMPLETED TASKS MODAL -->
<div id="taskInfo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="comTaskHeader"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" id="returnIncomplete">
                    {{ csrf_field() }}
                    {{ method_field('patch')}}
                    <input name="completedTask_ID" type="hidden" id="completedTask_ID" value="">
                    <button type="submit" class="btn btn-dark mb-3"><i class="fa fa-arrow-left mr-1" aria-hidden="true"></i>Return To Incomplete</button>
                </form>
                <form action="/updatetask" method="post" id="editForm">
                    {{ method_field('patch')}}
                    <div class="form-group">
                        <label for="task">Task</label>
                        <input id="updateTask" class="form-control" type="text" name="task" placeholder="Take A Walk...">
                    </div>
                    <div class="form-group">
                        <label for="details">Task Details</label>
                        <textarea class="form-control" rows="5" name="details" id="updateDetails"></textarea>
                    </div>
                    <label for="priority">Priority</label>
                        <select class="form-control" id="updatePriority">
                            <option>Important</option>
                            <option>Urgent</option>
                            <option>Ignore</option>
                            <option>Optional</option>
                        </select>
                    {{ csrf_field() }}
                    <p class="mt-2" id="createdOn"></p>
                    <p id="updatedOn"></p>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-edit mr-1" aria-hidden="true"></i>Update Task</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>Delete Task</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- Deleted Modal -->
<div id="deletedModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Deleted Tasks</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <table id="deletedTable" class="table table-hover">
                    <thead class="thead-dark">
                        <th scope="col">Task</th>
                        <th scope="col">Created</th>
                        <th scope="col">Deleted</th>
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                    @foreach($deletedTasks as $delete)
                        <tr>
                            <th scope="row">{{ $delete->task}}</th>
                            <td>{{ \Carbon\Carbon::parse($delete->created_at)->diffForHumans() }}</td>
                            <td>{{ \Carbon\Carbon::parse($delete->deleted_at)->diffForHumans() }}</td>
                            <td><button type="button" class="btn btn-info btn-dark btn text-white">Restore</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>