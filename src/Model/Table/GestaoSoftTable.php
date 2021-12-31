<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GestaoSoft Model
 *
 * @property \App\Model\Table\MachineTable&\Cake\ORM\Association\BelongsTo $Machine
 * @property \App\Model\Table\SoftwareTable&\Cake\ORM\Association\BelongsTo $Software
 * @property \App\Model\Table\SoftVersionTable&\Cake\ORM\Association\BelongsTo $SoftVersion
 *
 * @method \App\Model\Entity\GestaoSoft newEmptyEntity()
 * @method \App\Model\Entity\GestaoSoft newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\GestaoSoft[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GestaoSoft get($primaryKey, $options = [])
 * @method \App\Model\Entity\GestaoSoft findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\GestaoSoft patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GestaoSoft[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\GestaoSoft|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GestaoSoft saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GestaoSoft[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\GestaoSoft[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\GestaoSoft[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\GestaoSoft[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GestaoSoftTable extends Table
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

        $this->setTable('gestao_soft');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Machine', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Software', [
            'foreignKey' => 'software_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('SoftVersion', [
            'foreignKey' => 'soft_version_id',
            'joinType' => 'INNER',
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

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('machine_id', 'Machine'), ['errorField' => 'machine_id']);
        $rules->add($rules->existsIn('software_id', 'Software'), ['errorField' => 'software_id']);
        $rules->add($rules->existsIn('soft_version_id', 'SoftVersion'), ['errorField' => 'soft_version_id']);

        return $rules;
    }
}
