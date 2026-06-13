const express = require('express');
const Datastore = require('nedb');
const path = require('path');

const app = express();
app.use(express.json());

// Inisialisasi NeDB
// File akan tersimpan di folder 'data' di dalam server Render
const db = new Datastore({ filename: path.join(__dirname, 'data', 'santri.db'), autoload: true });

// Port wajib membaca dari environment variable (Render)
const PORT = process.env.PORT || 10000;

app.get('/', (req, res) => {
    res.send('Aplikasi SantriInventory Berjalan!');
});

// Contoh endpoint menyimpan data
app.post('/tambah', (req, res) => {
    const data = req.body;
    db.insert(data, (err, newDoc) => {
        if (err) res.status(500).send(err);
        else res.send(newDoc);
    });
});

app.listen(PORT, () => {
    console.log(`Server berjalan di port ${PORT}`);
});
