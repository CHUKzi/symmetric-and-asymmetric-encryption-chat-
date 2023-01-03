<?php 
	function ModalC($mName) {
		if ($mName=="signup") {
			echo '<script>window.onload = () => { $("#signup").modal("show"); }</script>';
		} elseif ($mName=="login") {
			echo '<script>window.onload = () => { $("#login").modal("show"); }</script>';
		} elseif ($mName=="verify") {
			echo '<script>window.onload = () => { $("#verify").modal("show"); }</script>';
		} elseif ($mName=="showError") {
			echo '<script>window.onload = () => { $("#showError").modal("show"); }</script>';
		} elseif ($mName=="showSucess") {
			echo '<script>window.onload = () => { $("#showSucess").modal("show"); }</script>';
		} elseif ($mName=="addfriend") {
			echo '<script>window.onload = () => { $("#addfriend").modal("show"); }</script>';
		} elseif ($mName=="settings") {
			echo '<script>window.onload = () => { $("#settings").modal("show"); }</script>';
		}
	}

 ?>