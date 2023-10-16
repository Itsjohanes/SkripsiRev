<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
    <div class="form-container">
        <h2>Form Apersepsi Handling</h2>
        <?php echo form_open('Pertemuan/submitApersepsi'); ?>
        <input type="hidden" id="id_pertemuan" name="id_pertemuan" value="<?php echo $pertemuan['id_pertemuan']; ?>" required><br><br>

        <div>
            <label for="soal">Soal Apersepsi:</label><br>
            <?php echo $pertemuan['apersepsi']; ?>
        </div>

        <label for="jawaban">Jawaban Apersepsi:</label><br>
        <textarea id="jawaban" name="jawaban" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Kirim">
        <?php echo form_close(); ?>
    </div>
