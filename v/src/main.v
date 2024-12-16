module main

import os

fn main() {
    // Specify the file path
    file_path := 'file.txt'

    // Check to see if the file exists
    if !os.exists(file_path) {
        println('WARNING: File does not exist in this path')
        return
    }

    content := os.read_file(file_path) or {
        println('WARNING: File cannot be opened')
        return
    }

    println('File content:')
    for k,v in content {
        println('[${k}]') 
    }
}
