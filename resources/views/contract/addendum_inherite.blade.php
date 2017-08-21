@if (count($addendums) > 0)
    <h4>계약수정내역</h4>
    <table class="table table-">
        <tr>
            <th>변경코드</th>
            <th>계약번호</th>
            <th>계약명</th>
            <th>시작일</th>
            <th>종료일</th>
            <th colspan="2" style="text-align: center">증감액</th>
            <th>변경계약일</th>
            <th>file</th>
            <th>memo</th>
        </tr>
        @foreach( $addendums as $addendum)
            <tr>
                <td>{{ $addendum->type }}</td>
                <td>{{ $addendum->revised_no }}</td>
                <td>{{ $addendum->revised_name }}</td>
                <td>{{ $addendum->revised_startdate }}</td>
                <td>{{ $addendum->revised_enddate }}</td>
                <td>{{ $addendum->currency }}{{ $addendum->amount }}</td>
                <td>{{ $addendum->revised_date }}</td>
                <td>{{ $addendum->file }}</td>
                <td>{{ $addendum->memo }}</td>
            </tr>
        @endforeach
    </table>
@else
    <span></span>
@endif