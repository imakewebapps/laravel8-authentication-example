@extends('layouts.app')

@section('content')
<div class=" p-5 rounded w-100">
    <h1>Developer / Withdraw</h1>
    <p class="lead">
        API Key <code class="border p-2">{{ auth()->user()->key }}</code>

    </p>


            <div class="card " id="media-object4">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Withdraw Request</h6>
                    </div>
                    <div class="table-responsive mt-4 mb-4">
                        <strong> End Point </strong>
                        <pre class="p-3 bg-light">
                            <code>{{ url('api/withdraw/create') }}</code></pre>

                        <table class="table table-bordered table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Required</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">key</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">yes</span>
                                        </span>
                                    </td>
                                    <td>Api key defined to your dashboard</td>
                                </tr>

                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">amount</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">yes</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">Amount to be deposited.</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">currency</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">yes</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">Amount Currency</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">callbackurl</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">yes</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">Callback Url</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">name</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">yes</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">Account Name / Account Title</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">details</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">yes</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">Bank Details</span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-wrap mt-4">
                        <h5 class="mg-b-5 tx-inverse ">Example Code</h5>
                    </div>
                    <pre class="language-css line-numbers border p-4 bg-light"><code class="language-php">
                    function httpPost($url,$params) {
                    $postData = '';
                    foreach($params as $k =&gt; $v) {
                    $postData .= $k . '='.$v.'&amp;';
                    }
                    rtrim($postData, '&amp;');

                    $ch = curl_init();
                    curl_setopt($ch,CURLOPT_URL,$url);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                    curl_setopt($ch,CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

                    $output=curl_exec($ch);

                    curl_close($ch);
                    return $output;
                    }

                    $data = array(
                    'amount' =&gt; '200',
                    'currency' =&gt; 'TR',
                    'amount' =&gt; 'depositCreate',
                    'key' =&gt; 'd6a67356bbaf431b2f8c09198e5bbd82',
                    'callbackurl' =&gt; 'https://site.com/depositResponse',
                    'name' =&gt; 'Demo User',
                    'details' =&gt; 'ACC2141242242',
                    );
                    $response = httpPost('{{ url('api/withdraw/create') }}', $data);
                    </code>
                    </pre>
                    <div class="mt-3">
                        <h6 class="card-title mb-1">Depsit Link Response</h6>
                    </div>
                    <div class="alert alert-solid-info alert-dismissible fade show" role="alert">
                        <strong>Info:</strong> Response type jSON
                    </div>
                    <div class="table-responsive mt-4 mb-4">
                        <table class="table table-bordered table-striped mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">code</span>
                                        </span>
                                    </td>
                                    <td>200(success), 403(Mandatory parameters are missing), 408(System error)</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">message</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">Response description</span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">uuid</span>
                                        </span>
                                    </td>
                                    <td>
                                        <span class=" badge ">
                                            <span class="tx-13 text-dark">uuid to be used as reference</span>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <pre class="language-css line-numbers border p-2 bg-light"><code class="language-php">

                        {
                            "code": 200,
                            "message": "Withdrawl Request created",
                            "uuid": "99f956ce-9cfd-45ff-a2d6-6c8d3d34d39a"
                          }

                        </code></pre>
                </div>
            </div>


            <div class="card  mt-3" id="media-object4">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">Withdraw Status</h6>
                    </div>
                    <div class="table-responsive mt-4 mb-4">
                        <strong> End Point </strong>
                        <pre class="p-3 bg-light">
                            <code>{{ url('api/withdraw/status') }}</code></pre>
                            <table class="table table-bordered table-striped mg-b-0 text-md-nowrap">
                                <thead>
                                <tr>
                                    <th>Key</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                       <span class=" badge ">
                                       <span class="tx-13 text-dark">uuid</span>
                                       </span>
                                    </td>
                                    <td>uuid provided previously.</td>
                                </tr>
                                <tr>
                                    <td>
                                       <span class=" badge ">
                                       <span class="tx-13 text-dark">key</span>
                                       </span>
                                    </td>
                                    <td>
                                       <span class=" badge ">
                                       <span class="tx-13 text-dark">api key provided by plateform</span>
                                       </span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                            </div>
                            <div class="text-wrap mt-4">
                                <h5 class="mg-b-5 tx-inverse ">Example Code</h5>
                            </div>
                            <pre class="language-css line-numbers border p-4 bg-light"><code class="language-php">
                            function httpPost($url,$params) {
                            $postData = '';
                            foreach($params as $k =&gt; $v) {
                            $postData .= $k . '='.$v.'&amp;';
                            }
                            rtrim($postData, '&amp;');

                            $ch = curl_init();
                            curl_setopt($ch,CURLOPT_URL,$url);
                            curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                            curl_setopt($ch,CURLOPT_HEADER, false);
                            curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

                            $output=curl_exec($ch);

                            curl_close($ch);
                            return $output;
                            }

                            $data = array(
                            'uuid' =&gt; 'depositCreate',
                            'key' =&gt; 'd6a67356bbaf431b2f8c09198e5bbd82',
                            );
                            $response = httpPost('{{ url('api/withdraw/status') }}', $data);
                            </code>
                            </pre>
                            <div class="mt-3">
                                <h6 class="card-title mb-1">Depsit Link Response</h6>
                            </div>
                            <div class="alert alert-solid-info alert-dismissible fade show" role="alert">
                                <strong>Info:</strong> Response type jSON
                            </div>
                            <div class="table-responsive mt-4 mb-4">
                                <table class="table table-bordered table-striped mg-b-0 text-md-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Key</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class=" badge ">
                                                    <span class="tx-13 text-dark">code</span>
                                                </span>
                                            </td>
                                            <td>200(success), 403(Mandatory parameters are missing), 408(System error)</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class=" badge ">
                                                    <span class="tx-13 text-dark">uuid</span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class=" badge ">
                                                    <span class="tx-13 text-dark">uuid of request</span>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class=" badge ">
                                                    <span class="tx-13 text-dark">status</span>
                                                </span>
                                            </td>
                                            <td>
                                                <span class=" badge ">
                                                    <span class="tx-13 text-dark">Current Status of payment</span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <pre class="language-css line-numbers border p-2 bg-light"><code class="language-php">

                                {
                                    "code": 200,
                                    "uuid": "99f8335b-3e74-4a6f-b41a-c4a9c3d8da45",
                                    "status": "pending"
                                  }

                                </code></pre>
                        </div>
                    </div>




</div>
@endsection