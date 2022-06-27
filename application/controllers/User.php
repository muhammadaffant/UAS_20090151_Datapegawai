<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
		//include modal.php in views
		$this->inc['modal'] = $this->load->view('modal', '', true);
	}
	public function index()
	{
		$this->load->view('show', $this->inc);
	}

	public function show()
	{
		$data = $this->users_model->show();
		$output = array();
		foreach ($data as $row) {
?>
			<tr>

				<td><?php echo $row->nip; ?></td>
				<td><?php echo $row->nama; ?></td>
				<td><?php echo $row->alamat; ?></td>
				<td>
					<button class="btn btn-warning edit" data-id="<?php echo $row->id; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button> ||
					<button class="btn btn-danger delete" data-id="<?php echo $row->id; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</button>
				</td>
			</tr>
<?php
		}
	}

	public function insert()
	{
		$user['nip'] = $_POST['nip'];
		$user['nama'] = $_POST['nama'];
		$user['alamat'] = $_POST['alamat'];

		$query = $this->users_model->insert($user);
	}

	public function getuser()
	{
		$id = $_POST['id'];
		$data = $this->users_model->getuser($id);
		echo json_encode($data);
	}

	public function update()
	{
		$id = $_POST['id'];
		$user['nip'] = $_POST['nip'];
		$user['nama'] = $_POST['nama'];
		$user['alamat'] = $_POST['alamat'];

		$query = $this->users_model->updateuser($user, $id);
	}

	public function delete()
	{
		$id = $_POST['id'];
		$query = $this->users_model->delete($id);
	}
}
