#!/bin/zsh

for filename in ./midifiles/*.mid; do
    midi2ly "$filename" -o "./lyfiles/$(basename "$filename" .mid).ly"
    lilypond -fpdf "./lyfiles/$(basename "$filename" .mid).ly"
    mv "./$(basename "$filename" .mid).pdf" "./pdffiles/$(basename "$filename" .mid).pdf"
done