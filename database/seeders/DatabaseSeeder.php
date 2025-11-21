<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => "Emoodji",
                'email' => 'emoodji@gmail.com',
                'usertype' => 'admin',
                'password' => Hash::make('emoodji'),
                'email_verified_at' => now(),
                'reward' => 0,
            ],
            [
                'name' => "Testing",
                'email' => 'testing@gmail.com',
                'usertype' => 'user',
                'gender' => 'male',
                'password' => Hash::make('testing'),
                'email_verified_at' => now(),
                'reward' => 50 // user awal dapat 50 reward
            ]
        ]);

        DB::table('quizzes')->insert([
            [
                'quiz_name' => "Tes Mengenali Emosi",
                'user_id' => 1,
                'unlock_cost' => 10,
            ],
            [
                'quiz_name' => "Tes Tingkat Stres",
                'user_id' => 1,
                'unlock_cost' => 15,
            ],
            [
                'quiz_name' => "Tes Bersyukur",
                'user_id' => 1,
                'unlock_cost' => 12,
            ]
        ]);

        DB::table('permainans')->insert([
            [
                'name' => 'Mahjong',
                'type' => 'game',
                'reward' => 5,
            ],
            [
                'name' => 'Memory Game',
                'type' => 'game',
                'reward' => 5,
            ],
            [
                'name' => 'Puzzle Game',
                'type' => 'game',
                'reward' => 5,
            ],
            [
                'name' => 'Tebak Angka',
                'type' => 'game',
                'reward' => 5,
            ]
        ]);



        DB::table('questions')->insert([
            [
                'question' => "Emosi marah selalu berdampak negatif dan harus dihindari",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Merasa cemas adalah respons alami tubuh terhadap situasi yang dianggap berbahaya atau menantang.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Kebahagiaan dapat dipicu oleh pencapaian tujuan pribadi atau pengalaman positif.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Merasa sedih dalam jangka waktu lama tanpa alasan yang jelas adalah hal yang normal.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Ketika seseorang merasa takut, tubuh mereka dapat mengalami respons fisik seperti peningkatan detak jantung.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Tertawa tidak memiliki manfaat kesehatan yang signifikan.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Rasa jijik adalah emosi yang membantu kita menghindari hal-hal yang dapat membahayakan kesehatan.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Perasaan cinta hanya terjadi dalam konteks hubungan romantis.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Kemarahan yang dikelola dengan baik dapat digunakan sebagai motivasi untuk membuat perubahan positif.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '1',
            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Empati adalah kemampuan untuk memahami dan berbagi perasaan orang lain.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '1',
            ]
        ]);


        DB::table('questions')->insert([
            [
                'question' => "Stres adalah respons tubuh terhadap tuntutan atau tekanan dari lingkungan.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '2',
            ],
            [
                'question' => "Semua stres berdampak negatif pada kesehatan mental dan fisik.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '2',
            ],
            [
                'question' => "Ketegangan otot dan sakit kepala dapat menjadi tanda bahwa seseorang sedang mengalami stres.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '2',
            ],
            [
                'question' => "Hanya orang dewasa yang dapat mengalami stres.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '2',
            ],
            [
                'question' => "Stres kronis dapat meningkatkan risiko terkena penyakit jantung.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '2',
            ],
            [
                'question' => "Meditasi dan latihan pernapasan dalam dapat membantu mengurangi tingkat stres.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '2',
            ],
            [
                'question' => "Merasa stres sebelum ujian atau presentasi penting adalah hal yang tidak biasa.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '2',
            ],
            [
                'question' => "Tidur yang cukup dan berkualitas tidak berpengaruh pada tingkat stres seseorang.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '2',
            ],
            [
                'question' => "Menghabiskan waktu bersama keluarga dan teman-teman dapat membantu mengurangi stres.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '2',
            ],
            [
                'question' => "Tidak ada cara efektif untuk mengelola stres selain menghindari semua situasi yang menimbulkan stres.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '2',
            ],
        ]);

        DB::table('prediksi_features')->insert([
            [
                'name' => 'Tes Prediksi Depresi',
                'unlock_cost' => 20

            ]
        ]);

        DB::table('questions')->insert([
            [
                'question' => "Bersyukur adalah sikap menghargai dan merasa puas dengan apa yang dimiliki.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '3',
            ],
            [
                'question' => "Orang yang bersyukur cenderung memiliki kesehatan mental yang lebih baik.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '3',
            ],
            [
                'question' => "Menulis jurnal syukur setiap hari dapat meningkatkan perasaan positif.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '3',
            ],
            [
                'question' => "Bersyukur berarti harus puas dengan apa pun dan tidak berusaha untuk lebih baik.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '3',
            ],
            [
                'question' => "Mengungkapkan rasa syukur kepada orang lain dapat memperkuat hubungan sosial.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '3',
            ],
            [
                'question' => "Hanya hal-hal besar dalam hidup yang layak untuk disyukuri.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '3',
            ],
            [
                'question' => "Orang yang bersyukur lebih mungkin untuk menunjukkan empati dan membantu orang lain.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '3',
            ],
            [
                'question' => "Bersyukur tidak memiliki dampak pada kualitas tidur seseorang.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '3',
            ],
            [
                'question' => "Mengingat dan merenungkan momen-momen baik dalam hidup dapat meningkatkan rasa syukur.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'a',
                'quiz_id' => '3',
            ],
            [
                'question' => "Rasa syukur hanya bisa dirasakan ketika semuanya berjalan dengan baik dalam hidup.",
                'options' => '{"a":"True","b":"False"}',
                'answer' => 'b',
                'quiz_id' => '3',
            ],
        ]);


        // DB::table('quizzes')->insert([
        //     [
        //         'quiz_name' => "test",
        //         'user_id' => '1',
        //     ]
        // ]);

        // DB::table('questions')->insert([
        //     [
        //         'question' => "test",
        //         'options' => '{"a":"1","b":"2","c":"3","d":"4"}',
        //         'answer' => 'c',
        //         'quiz_id' => '1',
        //     ]
        // ]);

        DB::table('teks')->insert([
            [
                'no_teks' => 1,
                'teks1' => 'Wah, kamu luar biasa! Nampaknya suasana hatimu benar-benar cerah. Terus jaga pola hidup sehatmu, dan luangkan waktu untuk menikmati setiap momen kebahagiaan. Ingatlah bahwa merayakan keberhasilan kecilmu bisa menjadi bahan bakar yang luar biasa untuk semangat hidupmu.',
                'teks2' => 'Sungguh luar biasa, semangat positif yang kamu miliki benar-benar menjadi pilar kekuatan di tengah-tengah tantangan depresi. Keberanianmu untuk tetap bersinar dalam kegelapan adalah inspiratif. Terus pertahankan semangat positif itu, dan nikmatilah setiap momen kebahagiaan seolah-olah itu adalah harta karun yang tak ternilai. Hidup ini memang seperti petualangan yang menarik, dan setiap langkahmu membawa kebahagiaan lebih dekat. Penting untuk selalu mengingat bahwa kamu adalah individu yang luar biasa, dan mengapresiasi diri sendiri adalah langkah penting menuju pemulihan yang lebih baik.'
            ],
            [
                'no_teks' => 2,
                'teks1' => 'Selamat, kamu sedang berada dalam keadaan emosional yang baik! Jangan lupakan untuk merayakan pencapaianmu sendiri. Mungkin ini saat yang tepat untuk merenung tentang hal-hal yang memberimu kebahagiaan dan membangun kesejahteraan emosionalmu. Jangan sungkan untuk memberi dirimu hadiah dan apresiasi.',
                'teks2' => 'Selamat, Kesejahteraan emosional yang terpancar dari dirimu adalah bukti nyata akan kekuatan batin yang dimiliki setiap orang. Banggakan dirimu atas pencapaian ini dan teruslah mengejar impian-impian kecilmu. Ingatlah bahwa setiap langkah kecil menuju kebahagiaan memiliki dampak besar pada kesejahteraan mental. Pertahankan semangat positif yang telah kamu kembangkan, karena langkah-langkah besar masih menanti untuk diambil, membawamu menuju perjalanan hidup yang lebih memuaskan.'
            ],
            [
                'no_teks' => 3,
                'teks1' => 'Terlihat seperti saatnya memberikan perhatian lebih pada diri sendiri. Coba refleksikan apa yang bisa menciptakan keseimbangan dalam hidupmu. Terkadang, meluangkan waktu untuk mengevaluasi rutinitas dan menemukan cara baru untuk mengatasi stres bisa menjadi langkah positif. Kamu pantas mendapatkan kesejahteraan emosional yang optimal.',
                'teks2' => 'Saatnya memberikan perhatian lebih pada dirimu sendiri, Sobat Baik! Kekuatan besar yang kamu miliki untuk menciptakan perubahan positif sangat luar biasa. Temukan cara-cara baru untuk mengatasi stres dan fokuslah pada hal-hal yang memberimu kebahagiaan sejati. Tantangan yang kamu hadapi saat ini sebenarnya adalah peluang untuk tumbuh dan berkembang. Kamu sedang membangun pondasi yang kokoh untuk kehidupan yang lebih baik, dan teruslah melangkah maju dengan penuh keyakinan, karena masa depan yang cerah menantimu.'
            ],
            [
                'no_teks' => 4,
                'teks1' => 'Aku melihat ada beberapa tanda bahwa stres sedang hadir dalam hidupmu. Cobalah berbicara dengan seseorang, baik itu teman dekat atau anggota keluarga, tentang perasaanmu. Memiliki dukungan sosial dapat membantu meredakan beban emosional. Jangan ragu untuk memberi dirimu waktu untuk merenung dan mencari solusi yang sesuai denganmu.',
                'teks2' => 'Kamu pasti bisa melewati ini, Sobat! Setiap rintangan yang kamu hadapi adalah peluang nyata untuk menguatkan dirimu sendiri. Cari dukungan dari teman atau keluarga, dan gunakan pengalaman ini sebagai batu loncatan untuk tumbuh dan berkembang. Jangan ragu untuk memberi dirimu waktu untuk merenung dan mencari solusi yang memberdayakan. Ini adalah bagian integral dari perjalananmu yang bertujuan membangun ketangguhan dan kematangan batin. Kamu memiliki potensi luar biasa untuk melampaui batasan-batasan ini.'
            ],
            [
                'no_teks' => 5,
                'teks1' => 'Terlihat kamu tengah menghadapi tekanan yang cukup besar. Pertimbangkan untuk mencari dukungan profesional atau membicarakannya dengan seseorang yang kamu percayai. Ingat, tidak ada yang perlu dihadapi sendirian, dan meminta bantuan adalah tindakan penuh keberanian. Semoga kamu segera menemukan jalan untuk melalui fase ini dengan lebih ringan.',
                'teks2' => 'Sobat, kamu adalah pemenang sejati dalam perjuangan ini! Saatnya untuk bersinar lebih terang. Dukungan dari teman, keluarga, dan ahli kesehatan mental dapat membawa sinar ke dalam kegelapan yang kamu alami. Ingatlah bahwa kesembuhan adalah perjalanan panjang, dan setiap langkah yang kamu ambil adalah kemenangan besar yang patut dibanggakan. Kamu pantas untuk merasakan kebahagiaan yang mendalam dan penuh makna. Teruslah berjuang, karena di ujung sana ada cahaya yang menunggu untuk menyinari hari-harimu, membawa kehidupan yang lebih baik dan lebih bahagia.'
            ],
        ]);

        DB::table('informasis')->insert([
            [
                'judul' => "Informasi Depresi. Mengenal, Mencegah, dan Mengatasi",
                'isi' => 'Berikut adalah beberapa gejala umum yang perlu diwaspadai

                    1. Perasaan Sedih yang Berlarut-larut
                    Apakah remaja Anda sering merasa sedih, hampa, atau putus asa tanpa alasan yang jelas? Perasaan ini bisa berlangsung lama dan sulit dihilangkan, meskipun mereka mencoba untuk merasa lebih baik. Jangan abaikan tanda-tanda ini; mereka bisa menjadi indikasi awal dari depresi.

                    2. Menarik Diri dari Kegiatan Sosial
                    Dulunya aktif dalam berbagai kegiatan, sekarang lebih suka menyendiri? Remaja yang mengalami depresi cenderung menarik diri dari aktivitas sosial dan kehilangan minat dalam kegiatan yang sebelumnya mereka nikmati. Ini bisa termasuk berhenti bermain olahraga, menghindari pertemuan teman, atau bahkan tidak ingin pergi ke sekolah.

                    3. Kurang Konsentrasi di Dalam Kelas
                    Jika Anda melihat penurunan dalam prestasi akademik mereka, depresi bisa menjadi penyebabnya. Depresi mempengaruhi kemampuan remaja untuk fokus dan berkonsentrasi, yang menyebabkan kesulitan dalam mengikuti pelajaran, mengerjakan tugas, atau memahami instruksi dari guru.

                    4. Perubahan Pola Makan
                    Perhatikan perubahan drastis dalam pola makan mereka. Depresi bisa menyebabkan remaja kehilangan nafsu makan dan menurunkan berat badan, atau sebaliknya, makan berlebihan yang mengarah pada peningkatan berat badan yang signifikan. Kedua ekstrem ini bisa menjadi tanda peringatan penting.

                    5. Gangguan Pola Tidur
                    Gangguan tidur adalah tanda lain yang harus diperhatikan. Remaja dengan depresi mungkin mengalami insomnia (sulit tidur) atau hipersomnia (tidur berlebihan). Mereka mungkin merasa sangat sulit untuk bangun di pagi hari atau merasa sangat lelah meskipun sudah tidur cukup.

                    6. Sering Merasa Lelah
                    Perasaan lelah yang berkepanjangan tanpa sebab yang jelas juga sering terjadi pada remaja dengan depresi. Energi yang rendah dan kelelahan terus-menerus dapat mempengaruhi kemampuan mereka untuk menjalani aktivitas sehari-hari, termasuk hal-hal sederhana seperti bangun dari tempat tidur atau pergi ke sekolah.

                    ',
                'kategori' => 'Gejala Depresi',
                'sinopsis' => 'Depresi pada remaja bisa terlihat berbeda dibandingkan dengan gejala pada orang dewasa. Mengetahui tanda-tandanya bisa sangat membantu dalam memberikan dukungan yang dibutuhkan. Berikut adalah beberapa gejala umum yang perlu diwaspadai:',
            ],
            [
                'judul' => "Menelusuri Berbagai Jenis Depresi. Lebih dari Sekadar Sedih",
                'isi' => 'Mari kita lihat dua jenis depresi yang paling umum.

                    1. Major Depressive Disorder (MDD)

                    Jika Anda mengalami perasaan sedih yang mendalam dan kehilangan minat pada aktivitas yang biasanya menyenangkan, Anda mungkin mengidap Major Depressive Disorder (MDD) atau Depresi Mayor. Untuk di diagnosis dengan MDD, Anda perlu mengalami kondisi ini hampir sepanjang hari, setiap hari, selama minimal dua minggu. Beberapa gejala yang perlu Anda perhatikan termasuk.

                    Perubahan Pola Tidur. Tidur berlebihan atau kekurangan tidur yang signifikan.
                    Kekakuan Motorik. Perasaan tidak nyaman atau kekakuan dalam gerakan tubuh.
                    Perubahan Nafsu Makan. Kehilangan nafsu makan atau makan berlebihan yang signifikan.
                    Kehilangan Energi. Merasa lemas, tanpa semangat, dan kehilangan minat pada segala hal.
                    Perasaan Tidak Berharga. Merasa tidak berharga atau bersalah secara berlebihan.
                    Kesulitan Konsentrasi. Sulit untuk berkonsentrasi, berpikir, dan membuat keputusan.
                    Pikiran tentang Kematian atau Bunuh Diri. Munculnya pikiran-pikiran gelap tentang kematian atau bunuh diri.

                    2. Dysthymic Disorder (Distimia)

                    Dysthymic Disorder atau Distimia, meskipun lebih ringan daripada MDD, adalah bentuk depresi kronis yang berlangsung lebih lama. Individu dengan distimia mengalami kondisi depresif lebih dari separuh waktu selama minimal dua tahun. Beberapa gejala yang sering terjadi meliputi.

                    Perubahan Nafsu Makan. Kehilangan nafsu makan atau makan berlebihan.
                    Perubahan Pola Tidur. Tidur berlebihan atau kekurangan tidur.
                    Perasaan Tidak Berharga. Merasa rendah diri atau tidak berharga.
                    Kesulitan Berkonsentrasi. Kesulitan berkonsentrasi dan membuat keputusan.
                    Perasaan Kehilangan Harapan. Merasa putus asa dan kehilangan harapan.

                    Meskipun gejala Distimia lebih ringan daripada MDD, namun keberlangsungan yang lama dapat mengganggu kualitas hidup seseorang secara signifikan.

                    Jangan biarkan depresi mengambil alih hidup Anda. Jika Anda atau orang yang Anda kenal mengalami gejala-gejala ini, carilah bantuan profesional segera. Dengan dukungan yang tepat, ada harapan untuk memulihkan kesehatan mental dan kembali meraih kebahagiaan.
                    ',
                'kategori' => 'Macam-macam gangguan depresi',
                'sinopsis' => 'Depresi bukanlah kondisi yang satu ukuran untuk semua orang. Sebagai gangguan mental yang kompleks, depresi memiliki berbagai jenis, masing-masing dengan karakteristik dan gejala unik.',
            ]
        ]);
    }
}
