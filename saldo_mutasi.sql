SELECT tx.mutasi_id,
  tx.tanggal,
  tx.nourut,
  tx.jo_id,
  tx.jenis_id,
  tx.masuk,
  tx.keluar,
  tx.selisih,
  @mutasi := @mutasi + tx.selisih AS mutasi,
  tx.comment
FROM v201_mutasi tx
  CROSS JOIN (SELECT @mutasi := 0) sx
WHERE 1 = 1
ORDER BY tx.tanggal,
  tx.nourut
