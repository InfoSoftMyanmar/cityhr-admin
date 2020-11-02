<?php

namespace App\Helpers;
use App;

class Helper {
/*
 * File upload
 *
 * @param ConsultantRequest $request
 * @return static
 */
	public function fileUpload($request, $path, $name) {
		if ($request->hasFile($name) && $request->file($name)->getError() == 0) {
			$extension = $request->file($name)->getClientOriginalExtension();
			$imageName = substr(md5(microtime()), rand(0, 26), 10) . '.' . $extension;
			$request->file($name)->move($path, $imageName);
		} else {
			$imageName = null;
			// sending back with error message.
			\Session::flash('error', 'uploaded file is not valid');
		}
		return $imageName;
	}

	/**
	 * Multi File upload
	 *
	 * @param ConsultantRequest $request
	 * @return static
	 */
	public function multiFileUpload($request, $name, $path, $key) {
		if (strpos($request->$name[$key], ',') !== false) {
			$imgs        = explode(',', $request->$name[$key]);
			$imageName   = substr(md5(microtime()), rand(0, 26), 10) . '.png';
			$img_str_arr = explode(',', json_encode($imgs[1]));
			$img_str     = $img_str_arr[0];
			$data        = base64_decode($img_str);
			file_put_contents($path . $imageName, $data);
		} else {
			$imageName = $request->$name[$key];
		}

		return $imageName;
	}

	/**
	 * File Destroy
	 *
	 * @param ConsultantRequest $request
	 * @return static
	 */
	public function destroyFile($file, $path) {
		$fileName = $path . '/' . $file;
		if (file_exists($fileName)) {
			@unlink($fileName);
		}
	}

	public function combineImagePath($image, $path) {
		if ($image) {
			return preg_filter('/^/', $path, $image);
		}

		return null;
	}

	/**
	 * Upload Text Editor Image
	 *
	 * @param ConsultantRequest $request
	 * @return static
	 */
	public function uploadTextEditorImage($messages, $directory) {
		$specImages = array();

		$dom = new \DOMDocument('1.0', 'UTF-8');
		@$dom->loadHtml(mb_convert_encoding($messages, 'HTML-ENTITIES', 'UTF-8'));

		$images = $dom->getElementsByTagName('img');
		// foreach <img> in the submited message
		foreach ($images as $img) {
			$src = $img->getAttribute('src');

			// if the img source is 'data-url'
			if (preg_match('/data:image/', $src)) {

				// get the mimetype
				preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
				$mimetype = $groups['mime'];

				// Generating a random filename
				$filename     = uniqid();
				$specImages[] = "$filename.$mimetype";
				$filepath     = "$directory/$filename.$mimetype";
				// @see http://image.intervention.io/api/
				$image = Image::make($src)
				// resize if required
				/* ->resize(300, 200) */
					->encode($mimetype, 100) // encode file to the specified mimetype
					->save(public_path($filepath));

				$new_src = asset($filepath);
				$img->removeAttribute('src');
				$img->setAttribute('src', $new_src);
			} // <!--endif
		} // <!--endforeach
		$description['text']   = $dom->saveHTML($dom->documentElement);
		$description['images'] = $specImages;

		return $description;
	}
}
