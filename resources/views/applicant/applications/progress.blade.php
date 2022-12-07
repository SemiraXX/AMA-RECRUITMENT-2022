

<!--MANAGE APPLICATION PROGRESS-->
<p class="progress-step-title">Application Progress Logs</p>
                <br>
                <ul class="events">



                <!--THIS IS THE LATEST STATUS-->
                @if($lateststatus)

                        @if($lateststatus->status == "Awaiting")

                        @elseif($lateststatus->status == "For-Onboarding")

                            <li>
                                <time datetime="1">*</time>
                                <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                Message: {{$lateststatus->message}} <br> ({{$lateststatus->data_modified}})
                                <br><br>
                                <a href="https://forms.gle/LETsyXkPmpHvruPL7 on">Onboarding notes</a>
                                </span>
                                <br><br>
                            </li>

                        @elseif($lateststatus->status == "For-Pre-Employment-Requirements")


                            <!--TO CHECK IF HAS REQUIREMENTS-->
                            @if($requirements->isEmpty())
                              <li>
                                <time datetime="1">*</time>
                                <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                Message: {{$lateststatus->message}} <br> ({{$lateststatus->data_modified}})
                                <br>
                                <button type="submit" class="take-exam-btn uploadrequirments">Upload Requirments</button>
                                </span>
                                <br><br>
                              </li>
                              @else
                              <li>
                                <time datetime="1">*</time>
                                <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                Message: {{$lateststatus->message}} <br> ({{$lateststatus->data_modified}})
                                <br>
                                <button type="submit" class="take-exam-btn viewattachement">Your Attachements</button>
                                <button type="submit" class="take-exam-btn uploadrequirments">Upload Requirments</button>
                                </span>
                                <br><br>
                              </li>
                              @endif
                              <!--TO CHECK IF HAS REQUIREMENTS-->


                        @elseif($lateststatus->status == "For-Criteria-Evaluation")

                              <!--@if(!$requirements->isEmpty())
                              <li>
                                <time datetime="1">*</time>
                                <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                Message: {{$lateststatus->message}} <br> ({{$lateststatus->data_modified}})
                                <br>
                                <button type="submit" class="take-exam-btn viewattachement">Your Attachements</button>
                                </span>
                                <br><br>
                              </li>
                              @else
                              <li>
                                <time datetime="1">*</time>
                                <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                Message: {{$lateststatus->message}} <br> ({{$lateststatus->data_modified}})
                                <br>
                                <button type="submit" class="take-exam-btn uploadcredentials">Upload Requirments</button>
                                </span>
                                <br><br>
                              </li>
                              @endif-->
                              

                        @elseif(($lateststatus->status == "For-Exam") || ($lateststatus->status == "For-Exam-and-Essay"))

                                <!--TO CHECK IF HAS EXAM-->
                                @if($examresults->isEmpty())
                                  <li>
                                    <time datetime="1">*</time>
                                    <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                    Message: {{$lateststatus->message}} <br> ({{$lateststatus->data_modified}})
                                    <br>
                                    <button type="submit" class="take-exam-btn takeexambtn">Take Exam</button>
                                    </span>
                                    <br><br>
                                  </li>
                                  @else
                                  <li>
                                    <time datetime="1">*</time>
                                    <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                    Message: {{$lateststatus->message}} <br> ({{$lateststatus->data_modified}})
                                    <br>
                                    <p class="completed-label">Exam Completed</p>
                                    </span>
                                    <br><br>
                                  </li>
                                  @endif
                                <!--TO CHECK IF HAS EXAM-->

                        @elseif($lateststatus->status == "For-Initial-Interview")

                              <!--ALLOW REPLIES IF FIRST INTERVIEW-->
                              <li>
                                <time datetime="1">*</time>
                                <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                <i class="fa fa-users" aria-hidden="true"></i>: {{$lateststatus->message}} 
                                <br><strong class="progress-time-style">{{$lateststatus->data_modified}}</strong>
                                <?php $replies = DB::table('tbl_applicants_reply')->where('applicationID', $applications->application_id)->orderBy('datePosted', 'ASC')->get(); ?>
                                <br>
                                @if($replies)
                                  @foreach($replies as $reply)
                                  <i class="fa fa-user" aria-hidden="true"></i>: {{$reply->message}}<br>
                                  <strong class="progress-time-style">{{$reply->datePosted}}</strong>
                                  <br>
                                  @endforeach
                                @else
                            
                                @endif
                                <form action="{{ route('reply.submit') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$applications->application_id}}" name="application_id">
                                <input type="hidden" value="{{$applications->userid}}" name="userid">
                                <input type="hidden" value="{{$applications->status}}" name="status">
                                <input type="hidden" value="{{$lateststatus->hr_userid}}" name="hr_userid">
                                <textarea class="reply-input"  rows="1" name="messagereply" required placeholder="type here..."></textarea>
                                <button class="btn-reply" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> send reply</button>
                                </form> 
                                <br>
                                </span>
                              </li>
                                  
                        @else

                              <li>
                                <time datetime="1">*</time>
                                <span><strong class="completed-label">{{$lateststatus->status}}</strong>
                                Message: {{$lateststatus->message}} <br> ({{$lateststatus->data_modified}})
                                </span>
                                <br><br>
                              </li>

                        @endif




                @else

                @endif





                <!--PREVIOUS PROGRESS-->
                @foreach($applicationstatuses as $status)
                
                    @if(($status->status == "For-Exam") || ($status->status == "For-Exam-and-Essay"))

                          <!--TO CHECK IF HAS EXAM-->
                          @if($examresults->isEmpty())
                          <li class="past-progress">
                            <time datetime="1">*</time>
                            <span><strong clas="steps-title">{{$status->status}}</strong>
                            Message: {{$status->message}} <br> ({{$status->data_modified}})
                            <br>
                            <button type="submit" class="take-exam-btn takeexambtn">Take Exam</button>
                            </span>
                            <br><br>
                          </li>
                          @else
                          <li class="past-progress">
                            <time datetime="1">*</time>
                            <span><strong clas="steps-title">{{$status->status}}</strong>
                            Message: {{$status->message}} <br> ({{$status->data_modified}})
                            <br>
                            <p class="completed-label">Exam Completed</p>
                            </span>
                            <br><br>
                          </li>
                          @endif
                           <!--TO CHECK IF HAS EXAM-->

                    @elseif($status->status == "For-Pre-Employment-Requirements")


                          <!--TO CHECK IF HAS REQUIREMENTS-->
                          @if($requirements->isEmpty())
                          <li class="past-progress">
                            <time datetime="1">*</time>
                            <span><strong clas="steps-title">{{$status->status}}</strong>
                            Message: {{$status->message}} <br> ({{$status->data_modified}})
                            <br>
                            <button type="submit" class="take-exam-btn uploadrequirments">Upload Requirments</button>
                            </span>
                            <br><br>
                          </li>
                          @else
                          <li class="past-progress">
                            <time datetime="1">*</time>
                            <span><strong clas="steps-title">{{$status->status}}</strong>
                            Message: {{$status->message}} <br> ({{$status->data_modified}})
                            <br>
                            <button type="submit" class="take-exam-btn viewattachement">View Attachements</button>
                            </span>
                            <br><br>
                          </li>
                          @endif
                          <!--TO CHECK IF HAS REQUIREMENTS-->





                    @elseif($status->status == "For-Criteria-Evaluation")


                          <li class="past-progress">
                            <time datetime="1">*</time>
                            <span><strong clas="steps-title">{{$status->status}}</strong>
                            Message: {{$status->message}} <br> ({{$status->data_modified}})
                            <br>
                            <button type="submit" class="take-exam-btn uploadrequirments">Upload Requirments</button>
                            </span>
                            <br><br>
                          </li>



                    @else

                    <li class="past-progress">
                      <time datetime="1">*</time>
                      <span><strong clas="steps-title">{{$status->status}}</strong>
                      Message: {{$status->message}} <br> ({{$status->data_modified}})</span>
                      <br><br>
                    </li>

                    @endif

                  @endforeach



                  <!--default progress after submission-->
                  <li class="past-progress">
                      <time datetime="1">*</time> 
                      <span><strong clas="steps-title">Waiting for the employer</strong></span>
                      <br><br>
                  </li>

                  <li class="past-progress">
                      <time datetime="1">*</time> 
                      <span><strong clas="steps-title">Applied</strong>{{$applications->date_applied}}</span>
                      <br><br>
                  </li>
                      
                  </ul>