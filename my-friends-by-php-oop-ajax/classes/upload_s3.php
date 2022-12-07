<?php

require_once '../vendor/autoload.php';

use Aws\S3\S3Client;

$s3 = new S3Client([
    'version' => '2006-03-01',
    'scheme' => 'https',
    'region'  => 'ap-southeast-1',
    'credentials' => [
        'key'    => 'AKIAVJH5OBNALLPJXXNB',
        'secret' => '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',
    ],
]);

class upload_s3 extends S3Client
{
	public function putObject($namefile, $filepath)
	{
		$s3 = $this->connect();
		$s3->putObject(array(
			'Bucket' => (string)$this->_bucket,
			'Key'    => $namefile,
			'SourceFile'   => $filepath,
			'ACL'         => 'public-read',
		));
		return $s3->waitUntilObjectExists(array(
			'Bucket' => $this->_bucket,
			'Key'    => $namefile
		));
	}
}

?>