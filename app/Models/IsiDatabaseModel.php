<?php

namespace App\Models;

use CodeIgniter\Model;

class IsiDatabaseModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'isidatabases';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function bukutersedia()
    {
        $query = $this->db->query("INSERT INTO `bukutersedia` (`id`, `judulbuku`, `id_buku`, `stok`) VALUES
        (1, 'Memulai Kembali Mengapa Tidak', 'bk01', 15),
        (2, 'Andreatta', 'bk02', 15),
        (3, 'Syair Sang Mentari', 'bk03', 12),
        (4, 'Sekawan', 'bk04', 11),
        (5, 'Ice Princess', 'bk05', 15),
        (6, 'Gak Jelas', 'bk06', 14)");
        return $query;
    }
    public function hlmnbuku()
    {
        $query = $this->db->query("INSERT INTO `hlmnbuku` (`id`, `id_buku`, `judulbuku`, `textbuku`, `kategoribuku`, `author`, `file_buku`, `stok`, `cover_buku`, `total_pinjam`)
        VALUES
        (1, 'bk01', 'Memulai Kembali Mengapa Tidak', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis mi quis dui sollicitudin hendrerit. Duis sollicitudin, libero iaculis laoreet tempus, nisi felis volutpat nisi, eu mollis tellus diam id risus. Praesent sed urna non orci lobortis consectetur. Suspendisse sed odio eget nibh sagittis bibendum. Curabitur aliquet, massa eget rutrum condimentum, felis massa auctor est, sit amet pulvinar ante mi eget velit. Sed in purus in mi mattis gravida non vel mi. Aenean eu aliquam tortor. Aenean dolor tortor, vestibulum et lorem vulputate, blandit pellentesque massa. Morbi mauris elit, condimentum eu odio in, gravida hendrerit metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse odio ligula, placerat eu risus vel, porta accumsan ante. Sed porttitor id turpis id interdum.', 'Fiction', 'Aiman Abdurrahman', 'Memulai Kembali Mengapa Tidak.pdf', 14, 'Memulai Kembali Mengapa Tidak.jpg', 4),
        (2, 'bk02', 'Andreatta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis mi quis dui sollicitudin hendrerit. Duis sollicitudin, libero iaculis laoreet tempus, nisi felis volutpat nisi, eu mollis tellus diam id risus. Praesent sed urna non orci lobortis consectetur. Suspendisse sed odio eget nibh sagittis bibendum. Curabitur aliquet, massa eget rutrum condimentum, felis massa auctor est, sit amet pulvinar ante mi eget velit. Sed in purus in mi mattis gravida non vel mi. Aenean eu aliquam tortor. Aenean dolor tortor, vestibulum et lorem vulputate, blandit pellentesque massa. Morbi mauris elit, condimentum eu odio in, gravida hendrerit metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse odio ligula, placerat eu risus vel, porta accumsan ante. Sed porttitor id turpis id interdum.', 'Mystery, Horror, Fiction', 'Ardian Hafiz Nurhilman', 'Andreatta.pdf', 5, 'Andreatta.jpg', 2),
        (3, 'bk03', 'Syair Sang Mentari', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis mi quis dui sollicitudin hendrerit. Duis sollicitudin, libero iaculis laoreet tempus, nisi felis volutpat nisi, eu mollis tellus diam id risus. Praesent sed urna non orci lobortis consectetur. Suspendisse sed odio eget nibh sagittis bibendum. Curabitur aliquet, massa eget rutrum condimentum, felis massa auctor est, sit amet pulvinar ante mi eget velit. Sed in purus in mi mattis gravida non vel mi. Aenean eu aliquam tortor. Aenean dolor tortor, vestibulum et lorem vulputate, blandit pellentesque massa. Morbi mauris elit, condimentum eu odio in, gravida hendrerit metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse odio ligula, placerat eu risus vel, porta accumsan ante. Sed porttitor id turpis id interdum.', 'Historical', 'Muhamad Annur Falah', 'Syair Sang Mentari.pdf', 11, 'Syair Sang Mentari.jpg', 2),
        (4, 'bk04', 'Sekawan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis mi quis dui sollicitudin hendrerit. Duis sollicitudin, libero iaculis laoreet tempus, nisi felis volutpat nisi, eu mollis tellus diam id risus. Praesent sed urna non orci lobortis consectetur. Suspendisse sed odio eget nibh sagittis bibendum. Curabitur aliquet, massa eget rutrum condimentum, felis massa auctor est, sit amet pulvinar ante mi eget velit. Sed in purus in mi mattis gravida non vel mi. Aenean eu aliquam tortor. Aenean dolor tortor, vestibulum et lorem vulputate, blandit pellentesque massa. Morbi mauris elit, condimentum eu odio in, gravida hendrerit metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse odio ligula, placerat eu risus vel, porta accumsan ante. Sed porttitor id turpis id interdum.', 'Self Improvement', 'Muhamad Ilham Nuari', 'Sekawan.pdf', 11, 'Sekawan.jpg', 3),
        (5, 'bk05', 'Ice Princess', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis mi quis dui sollicitudin hendrerit. Duis sollicitudin, libero iaculis laoreet tempus, nisi felis volutpat nisi, eu mollis tellus diam id risus. Praesent sed urna non orci lobortis consectetur. Suspendisse sed odio eget nibh sagittis bibendum. Curabitur aliquet, massa eget rutrum condimentum, felis massa auctor est, sit amet pulvinar ante mi eget velit. Sed in purus in mi mattis gravida non vel mi. Aenean eu aliquam tortor. Aenean dolor tortor, vestibulum et lorem vulputate, blandit pellentesque massa. Morbi mauris elit, condimentum eu odio in, gravida hendrerit metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse odio ligula, placerat eu risus vel, porta accumsan ante. Sed porttitor id turpis id interdum.', 'Self Improvement', 'Nika Qisty Fatharani', 'Ice Princess.pdf', 0, 'Ice Princess.jpg', 5),
        (6, 'bk06', 'Gak Jelas', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mollis mi quis dui sollicitudin hendrerit. Duis sollicitudin, libero iaculis laoreet tempus, nisi felis volutpat nisi, eu mollis tellus diam id risus. Praesent sed urna non orci lobortis consectetur. Suspendisse sed odio eget nibh sagittis bibendum. Curabitur aliquet, massa eget rutrum condimentum, felis massa auctor est, sit amet pulvinar ante mi eget velit. Sed in purus in mi mattis gravida non vel mi. Aenean eu aliquam tortor. Aenean dolor tortor, vestibulum et lorem vulputate, blandit pellentesque massa. Morbi mauris elit, condimentum eu odio in, gravida hendrerit metus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Suspendisse odio ligula, placerat eu risus vel, porta accumsan ante. Sed porttitor id turpis id interdum.', 'Gak jelas', 'Haruman', 'Gak Jelas.pdf', 2, 'Gak Jelas.jpg', 1");
        return $query;
    }
}
