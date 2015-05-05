<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-offset-2 col-md-8">

            <form action="../scripts/controllers/formControllers/hashFormController.php" method="post">
                <div class="form-group">
                    <textarea rows="18" cols="50" id="hashes" name="hashes" class="form-control hashes-box" placeholder="Insert one MD5/SHA1/SHA256 hash per line..." ></textarea>

                    <div class="row">
                        <div class="col-xs-6">
                            <button onclick="addHash();" type="button" class="btn btn-success btn-sm" style="margin-top: 20px;"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Sample Hash</button>
                            <div id="messageBox" class="light-text"></div>
                        </div>
                        <div class="col-xs-6">
                            <button type="submit" class="submit-button btn btn-primary btn-lg pull-right"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span> Analyze</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var sampleHashes = ['a854cb1793501645398b872a56ce0da9bc6575be9d033080cc51c6ec9c93efd6',
                        '32449fe6198c2fa48221ce1a03b3debb9e8fc85ac20bb4739a5291c0dbcecb7f',
                        '786c1845ad46a24894ee1ee745ab05b742192adc9dbc1b309f70b30c78f5f04e',
                        '79f38bda31d452e48dbfb46898aae55a05a58f7f4305af8ae48dbb0a13e6b145',
                        '1fd3fe5bab346a90fdb12218991cf3618b63409215fdfbece2f34af04610db10',
                        '1a74904a87e9548b799a25308be41a10c16ac51ae1843a0bfca91b2b5c8f061b',
                        '8f1e44d7d243eba107341eb3419e1ce864fd1d1c4474a76a35424d06180443cf',
                        '7568b086f2bdad59bbd1832e620df3fe44a80172768ada6194355f2c5b5b7238',
                        '827fca330f2c38b84a3ac3c96875bfbe499273020993127948f1643a2fe9e419',
                        'c2f3dfb127db5b5c2e23f86eed7fc2eb99fb6a3502ffbe5cd60535475ab44259',
                        '0e7fabd8670a256996f8a4c5aa8f74dd549eb6fcff1ab89a7a52e7271dc92ee9'];
    var index = 0;
    function addHash() {

        if (index<sampleHashes.length) {
            console.log('hey');
            $('#hashes').val($('#hashes').val() + sampleHashes[index] + '\n');
            index++;
        } else {
            $('#messageBox').html('<span class="glyphicon glyphicon-exclamation-sign"></span> That\'s all we\'ve got');
        }

    }

</script>