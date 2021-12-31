<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Software Model
 *
 * @property \App\Model\Table\GestaoSoftTable&\Cake\ORM\Association\HasMany $GestaoSoft
 * @property \App\Model\Table\SoftVersionTable&\Cake\ORM\Association\HasMany $SoftVersion
 *
 * @method \App\Model\Entity\Software newEmptyEntity()
 * @method \App\Model\Entity\Software newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Software[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Software get($primaryKey, $options = [])
 * @method \App\Model\Entity\Software findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Software patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Software[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Software|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Software saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Software[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Software[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Software[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Software[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SoftwareTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('software');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('GestaoSoft', [
            'foreignKey' => 'software_id',
        ]);
        $this->hasMany('SoftVersion', [
            'foreignKey' => 'software_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 20)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }
}
