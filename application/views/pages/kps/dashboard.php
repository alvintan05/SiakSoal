<div>
    <table class="table m-1 table-bordered">
    <thead>
        <tr>
            <td>kode soal</td>
            <td>mata kuliah</td>
            <td>file</td>
            <td>jenis soal</td>
            <td>semester</td>
            <td>dosen pembuat</td>
        </tr>
    </thead>
    <tbody>
    <?php  
        foreach($data_soal as $row) {
        ?>
        <tr>
            <td><?php echo $row->kode_soal; ?></td>
            <td><?php echo $row->namamk;?></td>
            <td><?php echo $row->file; ?></td>
            <td><?php echo $row->jenis_soal; ?></td>
            <td><?php echo $row->semesterke; ?></td>
            <td><?php echo $row->dosen_pembuat; ?></td>
        </tr>
    <?php
        }
        ?>
    </tbody>
    </table>
</div>