<?php
namespace App\Controllers;

class Santri extends BaseController
{
    protected $fileData = WRITEPATH . 'data/santri_data.json';

    public function index()
    {
        $data['barang'] = json_decode(file_get_contents($this->fileData), true) ?? [];
        return view('santri_view', $data);
    }

    public function simpan()
    {
        $file = $this->request->getFile('foto');
        if (!$this->validate(['foto' => 'uploaded[foto]|is_image[foto]|ext_in[foto,jpg,png]|max_size[foto,2048]'])) {
            return "Validasi gagal!";
        }

        $newName = $file->getRandomName();
        $file->move('assets/img/upload/', $newName);

        $dataLama = json_decode(file_get_contents($this->fileData), true) ?? [];
        $dataLama[] = ['nama' => $this->request->getPost('nama_barang'), 'foto' => $newName];
        file_put_contents($this->fileData, json_encode($dataLama, JSON_PRETTY_PRINT));

        return redirect()->to('/santri');
    }

    public function edit($index)
    {
        $data = json_decode(file_get_contents($this->fileData), true);
        return view('santri_edit', ['data' => $data[$index], 'index' => $index]);
    }

    public function update($index)
    {
        $data = json_decode(file_get_contents($this->fileData), true);
        $file = $this->request->getFile('foto');

        if ($file->isValid() && !$file->hasMoved()) {
            unlink('assets/img/upload/' . $data[$index]['foto']);
            $newName = $file->getRandomName();
            $file->move('assets/img/upload/', $newName);
            $data[$index]['foto'] = $newName;
        }

        $data[$index]['nama'] = $this->request->getPost('nama_barang');
        file_put_contents($this->fileData, json_encode(array_values($data), JSON_PRETTY_PRINT));
        return redirect()->to('/santri');
    }

    public function hapus($index)
    {
        $data = json_decode(file_get_contents($this->fileData), true);
        unlink('assets/img/upload/' . $data[$index]['foto']);
        unset($data[$index]);
        file_put_contents($this->fileData, json_encode(array_values($data), JSON_PRETTY_PRINT));
        return redirect()->to('/santri');
    }
}