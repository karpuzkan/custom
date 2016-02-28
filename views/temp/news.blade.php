<tr>
    <th scope="row">{!! $link->title !!}</th>
    <td>{!! $link->body !!}</td>
    <td>{!! $link->external!=''?Html::link($link->external, $link->title, ['target'=>'_blank']):null !!}</td>
    <td>{!! $link->pdf!=''?Html::link($link->pdf, $link->title, ['target'=>'_blank']):null !!}</td>
</tr>