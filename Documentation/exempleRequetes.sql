SELECT * FROM ALBUM A 
INNER JOIN MUSIQUE M
ON A.numAlbum = M.numAlbum
INNER JOIN Composer C 
ON C.numAlbum = A.numAlbum
INNER JOIN Auteur Au
ON Au.numAuteur = C.numAuteur
WHERE Au.nom LIKE "BLACKPINK";

SELECT * FROM Musique;