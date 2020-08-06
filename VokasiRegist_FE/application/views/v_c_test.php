<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<style>
    .menu-scroll {
        width: 290px;
        padding: 10px;
        overflow: scroll;
        height: 185px;
    }
</style>
<section class="section">
    <div class="section-header">
        <h1>Test Question</h1>
        <!-- Modal -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header ">
                    <h4>Question Test</h4>
                </div>
                <div class="card-body">
                    <div class="flashdatafail" data-flashdata="<?= $this->session->flashdata('msgfail'); ?>"></div>
                    <div class="flashdata" data-flashdata="<?= $this->session->flashdata('msg'); ?>"></div>
                    <div class="owl-carousel owl-theme" id="products-carousel">
                        <table id="no_soal" class="table table-striped table-bordered" style="width:100%">
                            <div class="blank"></div>
                            <div class="float-right menu-scroll border-primary">

                                <?php
                                $tmp = 0;
                                for ($i = 1; $i <= 10; $i++) {
                                    echo '<div class="row mb-1 ml-1 mr-1">';
                                    for ($j = 1; $j <= 5; $j++) {
                                        $tmp += 1;
                                        echo '<button class="col mr-1 btn btn-primary" id="soal">' . $tmp . '</button>';
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <div>
                                <div class="no_soal mb-3">1. cek ?</div>
                                <div class="pg ml-3">
                                    <div class="pg_a mb-2"><input type="radio" name="pg" id=""> indonesia</div>
                                    <div class="pg_b mb-2"><input type="radio" name="pg" id=""> indonesia</div>
                                    <div class="pg_c mb-2"><input type="radio" name="pg" id=""> indonesia</div>
                                    <div class="pg_d mb-2"><input type="radio" name="pg" id=""> indonesia</div>
                                    <div class="pg_e mb-2"><input type="radio" name="pg" id=""> indonesia</div>
                                </div>
                            </div>
                            <button class="btn btn-danger mr-2 mt-2">Back</button>
                            <div class="btn btn-warning mr-2 mt-2"><input type="checkbox" name="ragu" id=""> Ragu</div>
                            <button class="btn btn-success mt-2">Next</button>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>