<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPORTAR PERSONAS</title>
</head>
<body>
    <div class="container">
        <h3 align="center">IMPORTAR PERSONAS A BASE DE DATOS</h3>
        <br>
        <form method="POST" enctype="multipart/form-data" action="import-excel">
            {{ csrf_field() }}
            <div class="form-group">
                <table>
                    <tr>
                        <td width="40%" align="right"><label>Selecciona un archivo excel</label></td>
                        <td width="30">
                            <input type="file" name="select_file">
                        </td>
                        <td width="30%" align="left">
                            <input type="submit" name="upload" class="btn btn-primary" value="upload">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</body>
</html>